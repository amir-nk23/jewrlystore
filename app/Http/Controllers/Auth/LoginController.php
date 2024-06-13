<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use http\Client\Curl\User;
use http\Client\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

//    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function showLoginForm()
    {

        return view('auth.login');
    }

    public function login (\Illuminate\Http\Request $request){



       $user=\Modules\User\Entities\User::where('fullname',$request->fullname)->first();

        if(!Hash::check(($request->password),$user->password)){
            throw \Illuminate\Validation\ValidationException::withMessages(['password'=>['پسوورد شما اشتباه می باشد']]);
        }else{


            Session::put('user',$user);
          return  redirect()->route('user.dashboard.index');


        }


    }


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
