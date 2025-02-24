<?php

namespace App\Http\Requests\Post\Comment;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'message' => ['required', 'string', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'Message is required',
            'message.string' => 'Message must be a string',
            'message.max' => 'Message cannot be longer than 2048 characters',
        ];
    }
}
