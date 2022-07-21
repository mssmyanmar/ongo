<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Branch;
use App\Http\Resources\BranchResource;

class InputFieldResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $branchArray = [];
        if(isset($this->branch_data)){
            $dataArray = explode(',', $this->branch_data);
            for($i=0; $i < sizeof($dataArray); $i++){
                $branchlist = Branch::where('id',$dataArray[$i])->first();
                array_push($branchArray,new BranchResource($branchlist));
            }
        }
        return [
            'id'                => $this->id,
            'display_name'      => $this->display_name, 
            'validation_regex'  => $this->validation_regx,
            'display_order'     => $this->display_order, 
            'field_type'        => $this->field_type, 
            'is_required'       => $this->isRequired, 
            'min'               => $this->min, 
            'max'               => $this->max,
            'branch_data'       => isset($this->branch_data)?$branchArray:null,
        ];
    }
}