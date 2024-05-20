<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMedicalStaffRequest extends FormRequest
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
            'name' => 'required|string|max:100|unique:medical_staff,name,', Rule::unique('equipments', 'name')->ignore($this->medicalStaff),
            'role' => 'required|string|max:50|unique:medical_staff,role,', Rule::unique('equipments', 'role')->ignore($this->medicalStaff),
            'description' => 'nullable|string',
            'facility_id' => 'nullable|exists:facilities,id',
        ];
    }
}
