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
        $medicalStaffId = $this->route('medical_staff');

        return [
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('medical_staff')->ignore($medicalStaffId),
            ],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('medical_staff')->ignore($medicalStaffId),
            ],
            'medical_license_number' => [
                'required',
                'string',
                'max:50',
                Rule::unique('medical_staff')->ignore($medicalStaffId),
            ],
            'gender' => 'required|in:male,female,other',
            'current_employment' => 'required|in:yes,no',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|regex:/^[0-9\-\s\(\)]{10,15}$/',
            'image' => 'nullable|image|max:5120',
            'description' => 'nullable|string',
            'facility_id' => 'nullable|exists:facilities,id',
            'specialty_id' => 'nullable|exists:specialties,id|array'
        ];
    }
}
