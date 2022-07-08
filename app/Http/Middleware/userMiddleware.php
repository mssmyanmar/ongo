<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class userMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(Session::get('user_id')){
            return $next( $request );
        }else{
            return redirect('/');
        }
    }
}
