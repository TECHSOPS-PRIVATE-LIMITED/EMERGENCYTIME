<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthUserResource extends JsonResource
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
            'is_email_verified' => !is_null($this->email_verified_at),
            'phone' => $this->phone ?? '',
            'address' => $this->address  ?? '',
            'dob' => $this->dob  ?? '',
            'city' => $this->city  ?? '',
            'photo' => $this->photo  ? url($this->photo) : '',
            'country_id' => $this->country_id  ?? '',
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'role' => $role ? $role->name : null, // Role name, if available
            'permissions' => $role ? $role->permissions->pluck('name') : [], // Permissions, if available
            'token' => $this->token,
        ];
    }
}
