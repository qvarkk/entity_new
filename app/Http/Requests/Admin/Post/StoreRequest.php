<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'preview_image' => ['required', 'image', 'mimes:jpeg,jpg,png', 'max:2048'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'tag_ids' => ['nullable', 'array'],
            'tag_ids.*' => ['nullable', 'integer', 'exists:tags,id'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'title.string' => 'Title must be string',
            'title.max' => 'Title cannot be longer than 255 characters',
            'content.required' => 'Content is required',
            'content.string' => 'Content must be string',
            'preview_image.required' => 'Preview image is required',
            'preview_image.image' => 'Preview image must be image',
            'preview_image.mimes' => 'Preview image must be jpeg, jpg or png',
            'preview_image.max' => 'Preview image has to be less than 2MB (2048 KB)',
            'category_id.required' => 'Category is required',
            'category_id.integer' => 'Category must be integer',
            'category_id.exists' => 'Supplied category does not exist',
            'tag_ids.array' => 'Tag must be array',
        ];
    }
}
