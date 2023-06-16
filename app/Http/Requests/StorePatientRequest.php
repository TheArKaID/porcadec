<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePatientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'mrn' => ['string', 'nullable', 'max:255'],
            'sex' => ['string', 'in:M,F'],
            'birth_day' => ['date'],
            'birth_place' => ['string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['string'],
            'origin' => ['string', 'max:255'],
        ];
    }
}
