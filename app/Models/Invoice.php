<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'invoices';
    protected $guarded = [];

    protected $casts = [
        'date' => 'date:Y-m-d',
        'service_date' => 'date:Y-m-d',
        'due_date' => 'date:Y-m-d',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
        'deleted_at' => 'datetime:Y-m-d H:i:s',
        'amount' => 'decimal:12,2',
        'currency' => 'string',
        'secondary_currency' => 'string',
    ];

    public function status()
    {
        return $this->belongsTo(InvoiceStatus::class, 'status_id');
    }

//    public function company()
//    {
//        return $this->belongsTo(Company::class, 'company_id');
//    }
//
//    public function product()
//    {
//        return $this->belongsTo(Product::class, 'product_id');
//    }
//
//    public function customer()
//    {
//        return $this->belongsTo(Customer::class, 'customer_id');
//    }
}

