<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderPosition extends Model
{
    protected $fillable = [
        'amount',
        'order_id',
        'product_id'
    ];

    public static function add($orderId, $position)
    {
        return self::create([
            'amount'        => $position['amount'],
            'order_id'      => $orderId,
            'product_id'    => $position['id']
        ]);
    }
}
