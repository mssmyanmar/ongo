<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\InputFieldResource;

class ClientResource extends JsonResource
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
            'client_identifier' => $this->client_identifier, 
            'client_merchantId' => $this->merchant_id,
            'client_name'       => $this->client_name, 
            'client_type'       => $this->client_type, 
            'display_name'      => $this->display_name, 
            'img_url'           => $this->client_image, 
            'client_category'   => $this->client_category, 
            'inputfields'       => InputFieldResource::collection($this->inputFields),
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
