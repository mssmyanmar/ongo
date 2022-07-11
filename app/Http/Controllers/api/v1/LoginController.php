<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        $login = $request->validate([
            'phone_number'  => ['required','numeric'],
            'password'      => ['required','min:6'],
        ]);
        if($login){
            $user = User::where('phone_number',$request->phone_number)->where('password',$request->password)->first();
            if($user!=null){
                $accesstoken = $user->createToken('authToken')->accessToken;
                return response(["response_code" => "200200",
                                'staff'          => $user,
                                "accesstoken"    => $accesstoken]);       
            }else{
                return response(['message'=>'Invalid Phone number and password!']);
            }
        }else{
            return response(['message'=>'Invalid login credentials!']);
        }
    }
}
