<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\KudiSms;
use App\Mailer\ConfigPhpmailer;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    protected $maxAttempts = 3;

    use AuthenticatesUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ConfigPhpmailer $mail, KudiSms $sms)
    {
        $this->middleware('guest')->except('logout');
        $this->mail = $mail;
        $this->sms = $sms;
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        if(!$this->checkIfExist($request)){
            return redirect()->back()->withErrors('This account is not registered. Please check that your email address is correctly spelt and try again.');
        }
        
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if($this->checkIfLocked($request)){
            return redirect()->back()->withErrors('Your account has been blocked. Please contact admin to unlock your account.');
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            $this->clearLoginAttempts($request);
            return $this->sendLoginResponse($request);
        }

        $this->updateLoginAttempts($request);
        $this->checkLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }


    private function checkLoginAttempts($request)
    {
        $user = User::whereEmail($request->email)->first();

        if($user){
            if($user->login_attempt > 2){
                $this->fireIntrusion($request);
            }
        }
    }


    public function fireIntrusion($request)
    {
        $this->lockAccount($request);
        $this->sms->send($request, 'intrusion');
        $this->mail->sendMail($request, 'intrusion');
    }

    private function updateLoginAttempts($request)
    {
        $user = User::whereEmail($request->email)->first();
        $user->login_attempt = $user->login_attempt + 1;
        $user->save();
    }

    private function clearLoginAttempts($request)
    {
        $user = User::whereEmail($request->email)->first();
        $user->login_attempt = 0;
        $user->save();
    }

    private function lockAccount($request)
    {
        $user = User::whereEmail($request->email)->first();
        $user->login_status = 3; //Account locking code;
        $user->save();
    }

    private function checkIfLocked($request)
    {
       return User::whereEmail($request->email)->whereLoginStatus(3)->count();
    }

    private function checkIfExist($request)
    {
       return User::whereEmail($request->email)->count();
    }

}
