<?php

namespace App\Http\Controllers;
use App\Models\storeCash;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class ReportController extends Controller
{
    public function report(){
        $transactions = storeCash::select('store_cashes.*','users.name as staff_name','branches.branch_name')
                        ->leftjoin('users', 'store_cashes.staff_id', '=', 'users.id')
                        ->leftjoin('branches', 'store_cashes.branch_id', '=', 'branches.id')
                        ->get();
        $users        = User::whereHas('roles', function($q){
                            $q->where('name', 'staff')->orWhere('name','agent');
                        })->get();  
        return view ('reports.index',compact('transactions','users'));
    }

    public function searchTransaction(Request $request){
        $date  = strtotime($request->startDate);
        $startDate  = date('Y-m-d', $date);
        $date1  = strtotime($request->endDate);
        $endDate  = date('Y-m-d', $date1);
        if($request->checkVal==null && $request->startDate==null && $request->endDate==null){
            $transactions = storeCash::select('store_cashes.*','users.name as staff_name','branches.branch_name')
            ->leftjoin('users', 'store_cashes.staff_id', '=', 'users.id')
            ->leftjoin('branches', 'store_cashes.branch_id', '=', 'branches.id')
            ->get();
         return Datatables::of($transactions)->addIndexColumn()->toJson();
        }elseif($request->checkVal!=null && $request->startDate==null && $request->endDate==null){
           if(count($request->checkVal)>1){
                $transactions = storeCash::select('store_cashes.*','users.name as staff_name','branches.branch_name')
                ->leftjoin('users', 'store_cashes.staff_id', '=', 'users.id')
                ->leftjoin('branches', 'store_cashes.branch_id', '=', 'branches.id')
                ->get();
                return Datatables::of($transactions)->addIndexColumn()->toJson();
           }else{
                $transactions = storeCash::select('store_cashes.*','users.name as staff_name','branches.branch_name')
                ->where('store_cashes.company_id',$request->checkVal[0])
                ->leftjoin('users', 'store_cashes.staff_id', '=', 'users.id')
                ->leftjoin('branches', 'store_cashes.branch_id', '=', 'branches.id')
                ->get();
                return Datatables::of($transactions)->addIndexColumn()->toJson();
           }     
        }elseif($request->checkVal==null && $request->startDate!=null && $request->endDate!=null){
            $transactions = storeCash::select('store_cashes.*','users.name as staff_name','branches.branch_name')
                ->whereBetween('store_cashes.collected_date', [$startDate, $endDate])
                ->leftjoin('users', 'store_cashes.staff_id', '=', 'users.id')
                ->leftjoin('branches', 'store_cashes.branch_id', '=', 'branches.id')
                ->get();
                return Datatables::of($transactions)->addIndexColumn()->toJson();
        }elseif($request->checkVal!=null && $request->startDate!=null && $request->endDate!=null){
            if(count($request->checkVal)>1){
                $transactions = storeCash::select('store_cashes.*','users.name as staff_name','branches.branch_name')
                ->whereBetween('store_cashes.collected_date', [$startDate, $endDate])
                ->leftjoin('users', 'store_cashes.staff_id', '=', 'users.id')
                ->leftjoin('branches', 'store_cashes.branch_id', '=', 'branches.id')
                ->get();
                return Datatables::of($transactions)->addIndexColumn()->toJson();
           }else{
                $transactions = storeCash::select('store_cashes.*','users.name as staff_name','branches.branch_name')
                ->where('store_cashes.company_id',$request->checkVal[0])
                ->whereBetween('store_cashes.collected_date', [$startDate, $endDate])
                ->leftjoin('users', 'store_cashes.staff_id', '=', 'users.id')
                ->leftjoin('branches', 'store_cashes.branch_id', '=', 'branches.id')
                ->get();
                return Datatables::of($transactions)->addIndexColumn()->toJson();
           }    
        }else{
           $transactions = [];
           return Datatables::of($transactions)->addIndexColumn()->toJson();
        }
    }

    public function userType(Request $request){
        if($request->userType == "all"){
            $users = User::select('users.*','roles.name as role_name')
                    ->whereHas('roles', function($q){
                            $q->where('name', 'staff')->orWhere('name','agent');
                        })
                    ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                    ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                    ->get(); 
            return Datatables::of($users)->addIndexColumn()->toJson();
        }elseif($request->userType == "staff"){
            $users = User::select('users.*','roles.name as role_name')
                     ->whereHas('roles', function($q){
                            $q->where('name', 'staff');
                       })
                     ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                     ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                     ->get(); 
            return Datatables::of($users)->addIndexColumn()->toJson();
        }else{
            $users = User::select('users.*','roles.name as role_name')
                     ->whereHas('roles', function($q){
                            $q->where('name', 'agent');
                        })
                     ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                     ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                     ->get(); 
            return Datatables::of($users)->addIndexColumn()->toJson();
        }
    }
}