<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TreatmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'disease_name' => $this->disease_name,
            'category' => $this->category->name,
            'description' => $this->description ?? null,
            'precautions' => $this->precautions ?? null,
            'symptoms' => $this->symptoms ?? null,
            'medications' => $this->medications ?? null,
            'procedures' => $this->procedures ?? null,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
