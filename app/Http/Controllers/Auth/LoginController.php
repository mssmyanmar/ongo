<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use Redirect;

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

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function postLoginForm( Request $request ) 
    {
        $user = User::where( 'phone_number',$request->phone_number)->where('password',$request->password)->first();
        if($user) {
            $role_name = $user->getRoleNames()[0];
            Session::put('user_id', $user->id);
            Session::put('name', $user->name);
            Session::put('phone_number', $user->phone_number);
            Session::put('address', $user->address);
            Session::put('name', $user->name);
            Session::put('active_status', $user->active_status);
            Session::put('role_name', $role_name);
            return redirect()->route( 'dashboard' );
        }else{
            return redirect()->back()->withErrors( 'login invalid' );
        }

    }

    public function logout()
    {
        Auth::logout();
        Session::flush();
        return Redirect::to('/');
    }
}
