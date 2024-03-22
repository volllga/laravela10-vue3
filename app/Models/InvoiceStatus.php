<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceStatus extends Model
{
    public $timestamps = false;

    protected $fillable = ['priority', 'code', 'value'];

    static public function getAllStatuses(): \Illuminate\Support\Collection
    {
        return collect([
            ['priority' => 1, 'id' => '1', 'code' => 'new', 'value' => 'New'],
            ['priority' => 2, 'id' => '2', 'code' => 'pending', 'value' => 'Pending Payment'],
            ['priority' => 3, 'id' => '3', 'code' => 'paid', 'value' => 'Paid'],
            ['priority' => 4, 'id' => '4', 'code' => 'cancelled', 'value' => 'Cancelled'],
        ]);
    }

    static public function find($id)
    {
        return self::all()->firstWhere('id', $id);
    }

    static public function where($key, $value)
    {
        return self::all()->where($key, $value);
    }

    static public function byCodes($codes)
    {
        return self::all()->whereIn('code', $codes);
    }

    static public function allExcept($codes)
    {
        return self::all()->whereNotIn('code', $codes);
    }
}
