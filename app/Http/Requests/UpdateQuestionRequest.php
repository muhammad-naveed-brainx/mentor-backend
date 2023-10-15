<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuestionRequest extends FormRequest
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
            'stem' => ['required', 'string'],
            'type' => ['required', 'in:blank,multiple_choice, short_question'],
            'option_a' => ['sometimes', 'string'],
            'option_b' => ['sometimes', 'string'],
            'option_c' => ['sometimes', 'string'],
            'option_d' => ['sometimes', 'string'],
            'correct_answer' => ['sometimes', 'string'],
            'explanation' => ['sometimes', 'string'],
            'image' => ['sometimes', 'image', 'mimes:jpg,jpeg,png,svg,bmp,gif','max:4096'],
            'image_url' => ['sometimes', 'string', 'nullable'],
            'is_approved' => ['sometimes', 'boolean']
        ];
    }
}
