<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatchCustomerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // Update this to your authorization logic, if necessary
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        $customerId = $this->route('customer') ? $this->route('customer')->id : null;

        return [
            'company_name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('customers', 'company_name')->ignore($customerId)->whereNull('deleted_at'),
            ],

            'email' => 'sometimes|required|string|email|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'tax_identifier' => 'nullable|string|max:255',
        ];
    }
}
