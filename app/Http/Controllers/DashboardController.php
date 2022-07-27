<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Client;
use App\Models\storeCash;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $clients        = Client::all();
        $clientCounts   = Client::all()->count();
        $appStaffCounts = User::whereHas('roles', function($q){
                            $q->where('name', 'staff')->orWhere('name','agent');
                          })->get()->count();
        $allStaffCounts = User::whereHas('roles', function($q){
                            $q->where('name','office_staff')->orWhere('name','supervisor');
                          })->get()->count();
        
        $transactions = [];
        $clientTransaction = [];
        $monthCount = 12;
        for ($i=1; $i <= $monthCount ; $i++) { 
            $eachmonthTransaction = storeCash::whereMonth('collected_date', '=', $i)->get()->count();
            array_push($transactions,$eachmonthTransaction);
        }
        foreach ($clients as $key => $value) {
            $eachclientTransaction = storeCash::where('company_id', '=', $value->id)->get()->count();
            array_push($clientTransaction,$eachclientTransaction);
        }
        return view('dashboard',compact('clientCounts', 'appStaffCounts', 'allStaffCounts','transactions','clientTransaction'));
    }
}
