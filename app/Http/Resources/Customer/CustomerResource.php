<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'company_name' => $this->company_name,
            'email' => $this->email,
            'address' => $this->address,
            'city' => $this->city,
            'country' => $this->country,
            'phone' => $this->phone,
            'tax_identifier' => $this->tax_identifier,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d h:m'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d h:m'),
            'deleted_at' => Carbon::parse($this->deleted_at)->format('Y-m-d h:m'),
        ];
    }
}
