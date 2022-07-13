<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StaffResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                 => $this->id,
            "staff_name"         => $this->name, 
            "staff_phone_number" => $this->phone_number, 
            "staff_address"      => $this->address, 
            "staff_status"       => $this->active_status, 
            "role"               => $this->roles->pluck('name')[0],
        ];
    }
}