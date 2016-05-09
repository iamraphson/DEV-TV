<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;

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
            'username' => 'Username',
            'new_password' => 'New Password',
            'avatar' => 'Avatar'
        );

        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required',
        ], [], $niceNames);


        $user = User::findOrFail($this->authUser->id);
        if($request->has('new_password')){
            $this->validate($request, [
                'new_password' => 'required|min:6|confirmed'
            ], [], $niceNames);

            $user->password = bcrypt($request->input('password'));
        }

        if($request->hasFile('avatar')){
            $this->validate($request, [
                'avatar' => 'mimes:jpg,jpeg,bmp,png|between:1,7000',
            ], [], $niceNames);
            if(!str_contains($user->avatar_url, 'facebook')){
                $this->deleteAvatar($user->avatar_url);
            }

            $avatar = $this->uploadAvatar(Input::file('avatar'));
            $user->avatar_url = URL::asset($avatar);
        }

        $user->name = $request->input('fullname');
        $user->username = $request->input('username');
        $user->save();

        return redirect()->route('account.edit')->with('info', 'Profile Updated successfully');

    }

    private function deleteAvatar($coverLocation){
        if($coverLocation != "") {
            $coverLoc = explode(DIRECTORY_SEPARATOR, $coverLocation);
            unset($coverLoc[0], $coverLoc[1], $coverLoc[2]);
            $coverLocation = public_path(implode(DIRECTORY_SEPARATOR, $coverLoc));
            unset($coverLoc[5]);
            File::delete($coverLocation);
            File::deleteDirectory(public_path(implode(DIRECTORY_SEPARATOR, $coverLoc)));
        }
    }

    private function uploadAvatar($featuredImage){
        $uploadPath = DIRECTORY_SEPARATOR . "uploads" . DIRECTORY_SEPARATOR . time() . DIRECTORY_SEPARATOR;
        $destinationPath = public_path(). $uploadPath;
        $filename = $featuredImage->getClientOriginalName();
        $featuredImage->move($destinationPath, $filename);
        return $uploadPath . $filename;
    }
}
