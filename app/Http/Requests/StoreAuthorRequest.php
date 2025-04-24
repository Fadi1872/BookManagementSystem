<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuthorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the author’s name.',
            'nationality.required' => 'Please enter a nationality.',
            'dob.required' => 'Please select the date of birth.',
            'dob.before' => 'Date of birth must be in the past.',
        ];
    }
}
