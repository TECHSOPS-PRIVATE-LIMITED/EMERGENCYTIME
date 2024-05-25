<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTreatmentRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'disease_name' => 'required|string|min:2|max:255|unique:treatments,disease_name',
            'description' => 'nullable|string|max:500',
            'precautions' => 'nullable|string|max:1000',
            'symptoms' => 'nullable|string|max:1000',
            'medications' => 'nullable|string|max:1000',
            'procedures' => 'nullable|string|max:1000',
        ];
    }
}
