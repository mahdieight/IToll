<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'tn' => $this->tn,
            'status' => $this->status,
            'source_address' => $this->source_address,
            'source_lat' => $this->source_lat,
            'source_long' => $this->source_long,
            'destination_address' => $this->destination_address,
            'destination_lat' => $this->destination_lat,
            'destination_long' => $this->destination_long,
            'sender_name' => $this->sender_name,
            'sender_mobile' => $this->sender_mobile,
            'receiver_name' => $this->receiver_name,
            'receiver_mobile' => $this->receiver_mobile,
        ];
    }
}
