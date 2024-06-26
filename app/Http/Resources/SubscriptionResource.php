<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
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
            'id' => $this->id,
            'plan_type' => $this->plan_type,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date ?? null,
            'price' => $this->price ,
            'status' => $this->status ,
            'canceled_at' => $this->canceled_at ?? null,
            'user data' => $this->user,
        ];
    }
}
