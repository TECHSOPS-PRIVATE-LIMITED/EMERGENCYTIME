<?php

namespace App\Http\Resources;

use Avatar;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $role = $this->roles->first();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'created_at' => $this->created_at,
            'role' => optional($role)->name,
            'permissions' => optional($role)->permissions->pluck('name') ?? [],
            'photo' => $this->photo ? url($this->photo) : Avatar::create($this->name)->toBase64(),
            'phone' => $this->phone ?? '',
            'city' => $this->city ?? '',
            'country_id' => $this->country->id,
        ];
    }
}
