<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostInvoiceRequest extends FormRequest
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
        $invoiceId = $this->route('invoice') ? $this->route('invoice')->id : null;

        return [
            'number' => [
                'required',
                Rule::unique('invoices')->where(function ($query) use ($invoiceId) {
                    $query->whereNull('deleted_at');

                    // Exclude the current category ID if it exists (for updates)
                    if ($invoiceId !== null) {
                        $query->where('id', '!=', $invoiceId);
                    }
                }),
                'string',
            ],
            'date' => 'required|string',
            'service_date' => 'required|string',
            'due_date' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'number.required' => 'The number is required.',
            'number.unique' => 'The number must be unique.',
            'date.string' => 'The category name must be a string.',
            'service_date.string' => 'The category name must be a string.',
            'due_date.string' => 'The category name must be a string.',

        ];
    }
}
