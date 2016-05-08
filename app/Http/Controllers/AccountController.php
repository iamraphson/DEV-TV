<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class AccountController extends Controller{
    protected $authUser;
    public function __construct(){
        $this->authUser = Auth::user();
    }

    public function index(){
        return view('account.index')->with('profile', $this->authUser);
    }

    public function edit(){
        return view('account.edit')->with('profile', $this->authUser);
    }

    public function update(Request $request){
        $niceNames = array(
            'fullname' => 'Full Name',
            'username' => 'Username'
        );

        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required',
        ], [], $niceNames);


    }
}
