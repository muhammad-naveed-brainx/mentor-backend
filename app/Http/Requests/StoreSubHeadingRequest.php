<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubHeadingRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'explanation' => ['required', 'string'],
            'image' => ['sometimes', 'image', 'mimes:jpg,jpeg,png,svg,bmp,gif','max:4096'],
            'heading_id' => ['required', 'exists:headings,id']
        ];
    }
}