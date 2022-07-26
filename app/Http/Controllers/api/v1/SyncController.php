<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\storeCash;
use Carbon\Carbon;

class SyncController extends Controller
{
    public function sync(Request $request){
        $syncArray = $request->dataArray;
        $mytime = Carbon::now();
        if(count($syncArray)>0);{
            foreach ($syncArray as $key => $value) {
                $storeCash                 = new storeCash;
                $storeCash->staff_id       = $value['staff_id'] ;
                $storeCash->staff_name     = $value['staff_name'];
                $storeCash->company_id     = $value['company_id'];
                $storeCash->merchant_id    = $value['merchant_id'];
                $storeCash->company_name   = $value['company_name'];
                $storeCash->amount         = $value['amount'];
                $storeCash->description    = $value['description'];
                $storeCash->remarks        = $value['remark'];
                $storeCash->sync_status    = $value['sync_status'];
                $storeCash->collected_date = $mytime;
                if(isset($value['branch_id'])){
                    $storeCash->branch_id      = $value['branch_id'];
                }
                if(isset($value['loan_id'])){
                    $storeCash->loan_id        = $value['loan_id'];
                }
                if(isset($value['unique_id'])){
                    $storeCash->unique_id        = $value['unique_id'];
                }
                $storeCash->save();
            }
            return response(["response_code"    => "200203",
                             "status"           => "SUCCESS", 
                             "status_message"   => "Sync successful!", 
                             "internal_message" => "Sync successful!", 
                             "date_time_utc"    => $mytime, 
                             "data"             => [
                                "dataArray"     => $syncArray
                             ]
            ]); 
        }
    }
}