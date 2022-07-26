<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
            $phArray = str_split($request->phone_number);
            if($phArray[0]=="9"){
            unset($phArray[0]);
            unset($phArray[1]);
            $stringPhone = "0"+implode("",$phArray);
            }else{
            $stringPhone = $request->phone_number;
            }
            
            $user = User::where('phone_number',$stringPhone)->where('password',$request->password)->where('active_status',1)->first();
            if($user!=null){
                $role = $user->getRoleNames();
                if($role[0]=="staff" || $role[0]=="agent"){
                    $accesstoken = $user->createToken('authToken')->accessToken;
                    $mytime = Carbon::now();
                    return response(["response_code"    => "200200",
                                     "status"           => "SUCCESS", 
                                     "status_message"   => "Fetching staff info is successful!", 
                                     "internal_message" => "Fetching staff info is successful!", 
                                     "date_time_utc"    => $mytime, 
                                     "data"             => [
                                     "staff"            => $user,
                                     "accesstoken"      => $accesstoken
                                     ]]); 
                }else{
                    return response(['message'=>'Invalid Phone number and password!'],422);
                }    
            }else{
                return response(['message'=>'Invalid Phone number and password!'],422);
            }
    }
}