<?php

namespace App\Http\Resources;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ClientCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $mytime = Carbon::now();
        return [
            'response_code'    => "200200",
            'status'           => "status",
            "status_message"   => "Successfully fetch the client info.", 
            "internal_message" => " Successfully fetch the client info.", 
            "date_time_utc"    => $mytime,
            'data'             => ['clients'=> $this->collection],
            // 'links' => [
            //     'self' => 'link-value',
            // ],
        ];
    }
}
