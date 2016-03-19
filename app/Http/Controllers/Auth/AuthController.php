<?php

namespace App\Http\Controllers\Auth;

use Laracasts\Flash\Flash;
use Log;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
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
     * Change email to username when authenticating
     *
     * @var string
     */
    protected $username = "username";

    protected $model = "account";

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'register', 'getLogout']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * OVERRIDE
     */
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        Log::info("foobar1 - override");
        return $this->login($request);
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        Log::info("foobar2 - override");
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        Log::info("foobar3");
        $throttles = $this->isUsingThrottlesLoginsTrait();

        Log::info("foobar4");
        if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
            Log::info("foobar5");
            $this->fireLockoutEvent($request);
            Log::info("foobar6");
            return $this->sendLockoutResponse($request);
        }

        Log::info("foobar7");
        $credentials = $this->getCredentials($request);
        Log::info($credentials);

        Log::info("foobar8");
        if (Auth::guard($this->getGuard())->attempt($credentials, false)) {
            Log::info("foobar9");
            Session::save();
            flash()->overlay("You have been successfully connected.");
            return $this->handleUserWasAuthenticated($request, $throttles);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        Log::info("foobar10");
        if ($throttles && ! $lockedOut) {
            Log::info("increlent Login attempts");
            $this->incrementLoginAttempts($request);
        }

        Log::info("foobar11");
        return $this->sendFailedLoginResponse($request);
    }
}
