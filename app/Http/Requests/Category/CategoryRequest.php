<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $categoryId = $this->route('category') ? $this->route('category')->id : null;

        return [
            'category_name' => [
                'required',
                Rule::unique('categories')->where(function ($query) use ($categoryId) {
                    // Exclude soft-deleted records from the uniqueness check
                    $query->whereNull('deleted_at');

                    // Exclude the current category ID if it exists (for updates)
                    if ($categoryId !== null) {
                        $query->where('id', '!=', $categoryId);
                    }
                }),
                'string',
                'max:25',
            ],
            'category_description' => 'nullable|string|max:265',
            'active' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'category_name.required' => 'The category name is required.',
            'category_name.unique' => 'The category name must be unique.',
            'category_name.string' => 'The category name must be a string.',
            'category_name.max' => 'The category name must not exceed 25 characters.',
            'category_description.string' => 'The category description must be a string.',
            'category_description.max' => 'The category description must not exceed 265 characters.',
            'active.required' => 'The active field is required.',
            'active.boolean' => 'The active field must be a boolean.',
        ];
    }
}
