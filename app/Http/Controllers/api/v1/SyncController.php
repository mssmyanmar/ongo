<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SyncController extends Controller
{
    public function sync(Request $request){
        dd($request->array);
    }
}