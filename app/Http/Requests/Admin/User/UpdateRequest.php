<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email,' . $this->user_id,
                // Rule::unique('users')->ignore($this->user_id),
            ],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'role' => ['integer'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Title is required',
            'name.string' => 'Title must be a string',
            'name.max' => 'Name maximum 255 characters',
            'email.required' => 'Email is required',
            'email.string' => 'Email must be a string',
            'email.email' => 'Email must be a valid email',
            'email.max' => 'Email maximum 255 characters',
            'email.unique' => 'Email already exists',
            'role.integer' => 'Role must be an integer',
        ];
    }
}
