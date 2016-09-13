<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Config;
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
        return view('account.index')->with('profile', $this->authUser)
            ->withFavorites($this->getUserFavourites());
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

            $user->password = bcrypt($request->input('new_password'));
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

    public function getAdminIndex(){
        if(Config('database.default') == 'pgsql'){
            $userList = DB::select("select DISTINCT ON(id) active, id, name, username, email, role,
                  started_time, end_time from users_tbl left join subscription_tbl on subscription_tbl.user_id
                  = users_tbl.id order by id,purchase_time desc");
        } else {
            $userList = DB::select('select active, id, name, username, email, role, started_time, end_time from
            users_tbl left join subscription_tbl on subscription_tbl.user_id = users_tbl.id group by
            user_id order by subscription_tbl.purchase_time desc');
        }

        return view('admin.user.index')->withTitle('DevTv - List Users')->with('users', $userList);
    }

    public function getAdminEdit($id){
        $user = User::find($id);
        return view('admin.user.edit')->with('user', $user)->withTitle('DevTv - Edit User');
    }

    public function getAdminUpdate(Request $request, $id){
        $niceNames = array(
            'fullname' => 'Full Name',
            'username' => 'Username',
            'email' => 'Email',
            'new_password' => 'New Password',
            'avatar' => 'Avatar'
        );

        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
        ], [], $niceNames);


        $user = User::findOrFail($id);
        if($request->has('new_password')){
            $this->validate($request, [
                'new_password' => 'required|min:6'
            ], [], $niceNames);

            $user->password = bcrypt($request->input('new_password'));
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
        $user->email = $request->input('email');
        $user->role = $request->input('userrole');
        $user->active = $request->input('useractive');
        $user->save();


        return redirect()->back()->with('info', 'Profile Updated successfully');
    }

    public function suspendAccount($id){
        $user = User::findOrFail($id);
        $user->active = 0;
        $user->save();

        return redirect()->back()->with('info', 'Profile Updated successfully');
    }

    public function activateAccount($id){
        $user = User::findOrFail($id);
        $user->active = 1;
        $user->save();

        return redirect()->back()->with('info', 'Profile Updated successfully');
    }

    public function getAdminCreate(){
        return view('admin.user.new')->withTitle('DevTv - Add New User');
    }

    public function getAdminStore(Request $request){
        $niceNames = array(
            'fullname' => 'Full Name',
            'username' => 'Username',
            'email' => 'Email',
            'new_password' => 'New Password',
            'avatar' => 'Avatar'
        );

        $this->validate($request, [
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'new_password' => 'required|min:6'
        ], [], $niceNames);

        $user = new User;
        if($request->hasFile('avatar')){
            $this->validate($request, [
                'avatar' => 'mimes:jpg,jpeg,bmp,png|between:1,7000',
            ], [], $niceNames);

            $avatar = $this->uploadAvatar(Input::file('avatar'));
            $user->avatar_url = URL::asset($avatar);
        }


        $user->name = $request->input('fullname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('new_password'));
        $user->active = $request->input('useractive');
        $user->role = $request->input('userrole');

        $user->save();

        return redirect()->route('user.index')->with('info', 'Profile Added successfully');

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

    private function getUserFavourites(){
        $FAVORITE_VIDEO = Config::get('constants.FAVORITE_VIDEO');
        return $this->authUser->seenVideos()->where('operation_type','=', $FAVORITE_VIDEO)->get();
    }
}
