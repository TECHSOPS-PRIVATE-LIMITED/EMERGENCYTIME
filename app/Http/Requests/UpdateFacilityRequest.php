<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateFacilityRequest extends FormRequest
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
        'name' => 'required|string|max:100',
        'type' => 'required|in:hospital,clinic,consultancy,daycare,lab,diagnostic',
        'email' => [
            'required',
            'email',
            'max:255',
            Rule::unique('facilities')->ignore($this->facility),
        ],
        'country_id' => 'required|exists:countries,id',
        'phone_number' => 'required|string|regex:/^[0-9\-\s\(\)]{10,15}$/',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:60',
        'state' => 'required|string|max:60',
        'postal_code' => 'required|string|regex:/^\d{5,10}$/',
        'number_of_beds' => 'nullable|integer',
        'hipaa_status' => 'required|in:yes,no',
        'opening_hours' => 'required|string|max:100',
        'closing_hours' => 'nullable|string|max:100',
        'emergency_contact' => 'nullable|string|regex:/^\d{11,15}$/',
        'website' => 'nullable|url|max:255',
        'longitude' => 'nullable|numeric|between:-180,180',
        'latitude' => 'nullable|numeric|between:-90,90',
    ];
    }
}
