<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Symfony\Component\HttpFoundation\Request;
use Validator;
use Auth;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data){
        $niceNames = array(
            'full_name' => 'Full Name',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
        );

        $validator = Validator::make($data, [
            'full_name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users_tbl,email',
            'password' => 'required|min:6|confirmed'
        ]);

        $validator->setAttributeNames($niceNames);

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data){
        return User::create([
            'name' => $data['full_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'role' => 'user',
            'password' => bcrypt($data['password']),

        ]);
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')],
            $request->has('remember'))) {
            return redirect()->back()->with('error', 'Invalid Login Details');
        }
        return redirect($this->redirectTo);
    }

    public function redirectToProvider(){
        return Socialite::driver('facebook')->redirect();
    }

    public function  handleProviderCallback(){
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect()->route('auth.facebook');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect($this->redirectTo);
    }

    public function findOrCreateUser($user){
        $authUser = User::where('provider_id', $user->id)->first();

        if ($authUser){
            return $authUser;
        }

        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'role' => 'user',
            'avatar_url' => $user->avatar,
            'provider_id' => $user->id
        ]);
    }
}
