<?php

namespace App\Http\Controllers;
use App\Models\storeCash;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report(){
        $transactions = storeCash::select('store_cashes.*','users.name as staff_name','branches.branch_name')
                        ->leftjoin('users', 'store_cashes.staff_id', '=', 'users.id')
                        ->leftjoin('branches', 'store_cashes.branch_id', '=', 'branches.id')
                        ->get();
        return view ('reports.index',compact('transactions'));
    }
}