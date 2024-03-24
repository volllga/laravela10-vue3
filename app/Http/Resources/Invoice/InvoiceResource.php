<?php

namespace App\Http\Resources\Invoice;

use App\Http\Resources\Customer\CustomerResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
            'date' => Carbon::parse($this->date)->format('Y-m-d'),
            'service_date' => Carbon::parse($this->service_date)->format('Y-m-d'),
            'due_date' => Carbon::parse($this->due_date)->format('Y-m-d'),
            'status' => $this->status,
            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'amount' => $this->amount,
            'vat' => $this->vat,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::parse($this->updated_at)->format('Y-m-d H:i:s'),
        ];
    }
}
