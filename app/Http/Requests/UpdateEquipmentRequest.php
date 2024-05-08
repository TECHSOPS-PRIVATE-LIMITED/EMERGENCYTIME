<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEquipmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100|unique:equipments,name,' . $this->equipment->id,
            'description' => 'nullable|string|max:255',
            'last_maintenance_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:5120' // 5 MB limit
        ];
    }
}
