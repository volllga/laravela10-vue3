<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'employees';
    protected $fillable = [
        'active',
        'department_id',
        'first_name',
        'last_name',
        'document',
        'date_of_birth',
        'email',
        'phone',
        'position',
        'residency',
        'postal_code',
        'address',
        'city',
        'region',
        'country',
        'salary',
        'photo',
        'hire_date',
        'termination_date',
        'notes',
    ];

    protected $casts = [
        'active' => 'boolean',
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'date:Y-m-d',
        'deleted_at' => 'date:Y-m-d',
    ];
}
