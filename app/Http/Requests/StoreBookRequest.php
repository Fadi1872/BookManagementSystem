<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:authors,id',
            'published_at' => 'required|date|before:today'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The book title is required.',
            'category_id.required' => 'Please select a category.',
            'category_id.exists' => 'The selected category does not exist.',
            'author_id.required' => 'Please select an author.',
            'author_id.exists' => 'The selected author does not exist.',
            'published_at.required' => 'Please provide the published date.',
            'published_at.date' => 'The published date must be a valid date.',
        ];
    }

}
