<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Symfony\Component\HttpFoundation\Request;
use App\User;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {


        $email = $request['email'];
        $password = $request['password'];
        try {
            $user = User::where('email', $email)
                ->first();

            if ($user != null && \Hash::check($password, $user->password)) {

                $getFirstName = explode(' ', $user->name);
                $firstName = $getFirstName[0];

                $user->firstName = $firstName;

                Auth::loginUsingId($user->id);

                $request->session()->put('admin', [($user->admin)]);

                if ($user->admin) {
                    return redirect('/');
                } else {
                    return redirect('/event');
                }
            } else {

                return redirect('/login')->with('error', 'test');
            }
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'test');
        }
    }
}
