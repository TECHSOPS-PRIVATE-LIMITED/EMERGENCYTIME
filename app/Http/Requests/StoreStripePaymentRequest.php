<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStripePaymentRequest extends FormRequest
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
        $currentYear = date('Y');

        return [
            'name' => 'required|string|max:255',
            'card_number' => 'required|numeric|digits:16',
            'cvc' => 'required|numeric|digits:3',
            'exp_month' => 'required|numeric|between:1,12',
            'exp_year' => "required|numeric|digits:4|min:$currentYear|max:($currentYear + 10)",
        ];
    }
}
