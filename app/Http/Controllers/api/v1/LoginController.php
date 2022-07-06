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
            'phone'     => ['required','numeric'],
            'password'  => ['required','min:6'],
        ]);
        if($login){
            $staff = Staff::where('phone_number',$request->phone)->first();
            if($staff!=null){
                if(Hash::check($request->password, $staff->user->password)){
                    $accesstoken = $staff->createToken('authToken')->accessToken;
                    return response(['staff'=>$staff,"accesstoken"=>$accesstoken]);
                }else{
                    return response(['message'=>'Password Incorrect!']);
                }         
            }else{
                return response(['message'=>'Invalid Phone Number!']);
            }
           
        }else{
            return response(['message'=>'Invalid login credentials!']);
        }
    }
}
