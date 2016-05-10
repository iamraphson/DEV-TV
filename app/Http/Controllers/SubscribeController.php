<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use CreditCard;

class SubscribeController extends Controller{

    protected $authUser;
    public function __construct(){
        $this->authUser = Auth::user();
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

        $cardNumber = $request->input('credit_card');
        $ccv = $request->input('ccv');
        $month = $request->input('cardmm');
        $year = $request->input('cardyy');

        $card = CreditCard::validCreditCard($cardNumber);
        if(!$card['valid']){
            return redirect()->back()->withInput()->withErrors(['card_number'=>'The card number is not a valid credit card number.']);
        }

        $validDate = CreditCard::validDate($year, $month);
        if(!$validDate)
            return redirect()->back()->withInput()->withErrors(['card_expiry' => 'Invalid Expiry Date']);

    }
}
