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
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        'deleted_at' => 'date:Y-m-d',
        'amount' => 'float:2',
        'currency' => 'string',
        'secondary_currency' => 'string',
    ];

    public function getAmountAttribute($value)
    {
        return number_format($value, 2, '.', ',');
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

