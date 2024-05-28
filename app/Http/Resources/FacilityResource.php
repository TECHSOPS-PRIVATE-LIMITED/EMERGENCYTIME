<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FacilityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'postal_code' => $this->postal_code,
            'country_id' => $this->country_id,
            'number_of_beds' => $this->number_of_beds ?? null,
            'hipaa_status' => $this->hipaa_status,
            'opening_hours' => $this->opening_hours,
            'closing_hours' => $this->closing_hours ?? null,
            'emergency_contact' => $this->emergency_contact ?? null,
            'website' => $this->website ?? null,
            'longitude' => $this->longitude ?? null,
            'latitude' => $this->latitude ?? null,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
