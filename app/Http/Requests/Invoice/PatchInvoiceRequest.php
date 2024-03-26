<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatchInvoiceRequest extends FormRequest
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
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('invoices', 'number')->ignore($invoiceId)->whereNull('deleted_at'),
            ],
            'customer_id' => 'nullable|exists:customers,id',
            'amount' => 'nullable|numeric|min:0|max:9999999999.99',
            'currency' => 'nullable|in:usd,eur,pln',
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
