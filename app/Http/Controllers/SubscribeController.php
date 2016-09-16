<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use CreditCard;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use App\User;
use Carbon\Carbon;
use App\Subscription;

class SubscribeController extends Controller{

    protected $authUser;
    protected $amount;
    protected $invoiceDesc;
    protected $customerID = "";
    public function __construct(){
        $this->authUser = Auth::user();
        $this->amount = intval(env('AMOUNT'));
        $this->invoiceDesc = "Monthly Payment for DevTv subscription for " . date("F Y");
    }

    public function index(){
        return view('subscribe.index')->with('profile', $this->authUser);
    }

    public function paySubscription(Request $request){
        $dt = Carbon::now();
        $hasSubscribe = DB::table("users_tbl")
            ->join('subscription_tbl', 'users_tbl.id', '=', 'subscription_tbl.user_id')
            ->where('subscription_tbl.user_id', '=', $this->authUser->id)
            ->where('subscription_tbl.started_time','<=',$dt)
            ->where('subscription_tbl.end_time','>=',$dt)
            ->count();
        if($hasSubscribe == 0){
            $niceNames = array(
                'firstname' => 'First Name',
                'lastname' => 'Last Name'
            );

            $this->validate($request, [
                'lastname' => 'required',
                'firstname' => 'required',
            ], [], $niceNames);

            $firstname = $request->input('firstname');
            $lastname = $request->input('lastname');
            $token = $request->input('card_token');
            $email = $this->authUser->email;
            Stripe::setApiKey(env('STRIPE_SK'));

            if($this->authUser->stripe_customer_id == ""){
                try {
                    $customer = \Stripe\Customer::create([
                        'source' => $token,
                        'email' => $email,
                        'metadata' => [
                            "First Name" => $firstname,
                            "Last Name" => $lastname
                        ]
                    ]);
                } catch (\Stripe\Error\Card $e) {
                    return redirect()->back()->withInput()->withErrors($e->getMessage());
                }
                $this->customerID = $customer->id;
                $this->updateUserStripeID();
            } else {
                $this->customerID = $this->authUser->stripe_customer_id;
            }

            //print_r($this->authUser);

            try {
                $charge = \Stripe\Charge::create([
                    'amount' => $this->amount,
                    'currency' => 'usd',
                    'customer' => $this->customerID,
                    'metadata' => [
                        'product_name' => $this->invoiceDesc
                    ]
                ]);
            } catch (\Stripe\Error\Card $e) {
                return redirect()->back()->withInput()->withErrors($e->getMessage());
            }

            // Create subscription record in the database
            $this->addStripePurchase($this->amount, 0, $charge->id, Carbon::now(),
                Carbon::now()->toDateString(), Carbon::now()->addDays(30)->toDateString());

            return redirect()->route('subscribe.user')->with('info', 'Your Subscription was successfully');

        } else {
            return redirect()->back()->withErrors("Your subscription is still active!");
        }

    }

    public function getAdminSubscriptionForm(){
        $user = User::get(['email']);
        return view('admin.subscription.new')->withTitle('DevTv - User\'s Subscription')->withUsers($user);
    }

    public function addManuelSubscription(Request $request){
        $niceNames = array(
            'emails' => 'Email',
            'amount' => 'Amount',
            'payment_desc' => 'Payment Description',
            'discount' => 'Discount',
            'startdate' => 'Start Date',
            'enddate' => 'End date',
        );

        $this->validate($request, [
            'emails' => 'required|email',
            'payment_desc' => 'required',
            'amount' => 'required|numeric',
            'discount' => 'required|numeric',
            'startdate' => 'required|date|after:yesterday|date_format:Y-m-d',
            'enddate' => 'required|date|after:today|date_format:Y-m-d',
        ], [], $niceNames);


        $particularUser = User::where('email', $request->input('emails'))->first();
        if($particularUser->role == "admin"){
            return redirect()->back()->withInput()->withErrors("You can't subscribe for an Administrator");
        }

        $this->addSubscription($particularUser->id, $request->input('payment_desc'), $request->input('comment')
            ,'manuel', $request->input('amount'), $request->input('discount'), self::MakeDBId(), date('Y-m-d'),
            $request->input('startdate'), $request->input('enddate'), $this->authUser->name);

        return redirect()->back()->with('info', 'The Subscription was successfully');
    }

    public function getSubscriptionHistory(Request $request){
        $user = new User();
        $user = $user->get(['email']);

        $history = $this->buildHistoryQuery($request)->get();
        return view('admin.subscription.index')->withTitle('DevTv -  Subscription History')->withHistorys($history)
            ->with('users', $user);
    }

    private function buildHistoryQuery(Request $request){
        $sub = new Subscription();

        if($request->has('startdate')){
            $sub = $sub->where('purchase_time', '>=', $request->input('startdate'));
        }


        if($request->has('enddate')){
            $sub = $sub->where('purchase_time', '<=', $request->input('enddate'));
        }


        if($request->has('emails')){
            $particularUser = User::where('email', $request->input('emails'))->first();
            $sub = $sub->where('user_id', '=', $particularUser->id);
        }

        return $sub->orderBy('purchase_time', 'desc');
    }

    public function showSubscription($tranzid){
        $subscription = Subscription::where('transaction_id', $tranzid)->first();
        return view('admin.subscription.show')->withTitle('DevTv -  Subscription Detail\'s')->with('detail', $subscription);
    }


    private function addStripePurchase($amount, $discount, $tranzId, $purchasedate, $startdate, $endate){
        $this->addSubscription($this->authUser->id, $this->invoiceDesc, '','stripe', $amount, $discount, $tranzId,
            $purchasedate, $startdate, $endate, 'system');
    }

    private function updateUserStripeID(){
        $user = User::find($this->authUser->id);
        $user->stripe_customer_id = $this->customerID;
        $user->save();
    }

    private static function MakeDBId($yourTimestamp = null)
    {
        static $inc = 0;
        $id = '';

        if ($yourTimestamp === null) {
            $yourTimestamp = time();
        }
        $ts = pack('N', $yourTimestamp);
        $m = substr(md5(gethostname()), 0, 3);
        $pid = pack('n', posix_getpid());
        $trail = substr(pack('N', $inc++), 1, 3);
        $bin = sprintf("%s%s%s%s", $ts, $m, $pid, $trail);

        for ($i = 0; $i < 12; $i++) {
            $id .= sprintf("%02X", ord($bin[$i]));
        }

        return $id;
    }

    private function addSubscription($user_id, $paymentDesc, $comment, $paymentMethod, $amount, $discount, $tranzID, $purchasedate,
                                     $startdate, $endate, $doneby){
        Subscription::create([
            'user_id' => $user_id,
            'comment' => $comment,
            'payment_desc' => $paymentDesc,
            'payment_method' => $paymentMethod,
            'amount' => $amount,
            'discount' => $discount,
            'total_amt' => ($amount - $discount),
            'transaction_id' => $tranzID,
            'purchase_time' => $purchasedate,
            'started_time' => $startdate,
            'end_time' => $endate,
            'doneby' => $doneby,
        ]);
    }


}