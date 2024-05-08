<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTreatmentRequest extends FormRequest
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
            'category_name' => ['required', 'string', 'min:2', 'max:255', Rule::unique('treatments')->ignore($this->treatment->id)],
            'disease_name' => ['required', 'string', 'min:2', 'max:255', Rule::unique('treatments')->ignore($this->treatment->id)],
            'description' => 'nullable|string|max:500',
        ];
    }
}
