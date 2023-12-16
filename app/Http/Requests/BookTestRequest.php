<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookTestRequest extends FormRequest
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
            'text_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ];
    }

    public function messages(): Array
    {
        return [
            'required' => 'This field must not be empty.',
        ];
    }
}
