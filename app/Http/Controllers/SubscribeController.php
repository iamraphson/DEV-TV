<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use CreditCard;
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
        $this->addStripePurchase($this->amount, 0, $charge->id, Carbon::now(), Carbon::now()->toDateString(),
            Carbon::now()->addDays(30)->toDateString());

        return redirect()->route('subscribe.user')->with('info', 'Your Subscription was successfully');

    }

    private function addStripePurchase($amount, $discount, $tranzId, $purchasedate, $startdate, $endate){
        $this->addSubscription($this->authUser->id, $this->invoiceDesc, 'stripe', $amount, $discount, $tranzId,
            $purchasedate, $startdate, $endate, 'system');
    }

    private function updateUserStripeID(){
        $user = User::find($this->authUser->id);
        $user->stripe_customer_id = $this->customerID;
        $user->save();
    }

    private function addSubscription($user_id, $paymentDesc, $paymentMethod, $amount, $discount, $tranzID, $purchasedate,
                                     $startdate, $endate, $doneby){
        Subscription::create([
            'user_id' => $user_id,
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