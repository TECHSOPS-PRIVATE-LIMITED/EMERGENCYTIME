<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreMedicalStaffRequest extends FormRequest
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
                'name' => 'required|string|max:100|unique:medical_staff,name',
                'email' => 'required|email|max:255|unique:medical_staff,email',
                'medical_license_number' => 'required|string|max:50|unique:medical_staff,medical_license_number',
                'gender' => 'required|in:male,female,other',
                'current_employment' => 'required|in:yes,no',
                'dob' => 'required|date',
                'address' => 'required|string|max:255',
                'phone' => 'required|string|regex:/^[0-9\-\s\(\)]{10,15}$/',
                'image' => 'nullable|image|max:5120',
                'description' => 'nullable|string',
//                'facility_id' => 'nullable|exists:facilities,id',
            ];
    }

    // protected function failedValidation(Validator $validator)
    // {
    //     \Log::error('Validation failed', $validator->errors()->toArray());

    //     throw new HttpResponseException(response()->json([
    //         'status' => 'fail',
    //         'data' => $validator->errors()
    //     ], 422));
    // }
}
