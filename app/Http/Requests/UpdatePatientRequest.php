<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'mrn' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'sex' => 'required|string|in:M,F',
            'birth_day' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'address' => 'required|string',
            'origin' => 'required|string|max:255',
        ];
    }
}
