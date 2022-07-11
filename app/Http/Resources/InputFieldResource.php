<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        return [
            'id'                => $this->id,
            'display_name'      => $this->display_name, 
            'validation_regex'  => $this->validation_regx,
            'display_order'     => $this->display_order, 
            'field_type'        => $this->field_type, 
            'is_required'       => $this->isRequired, 
            'min'               => $this->min, 
            'max'               => $this->max, 
        ];
    }
}