<?php

namespace App\Models;

use App\Models\Produce\Product;
use Illuminate\Database\Eloquent\Model;

class OrderPosition extends Model
{
    protected $fillable = [
        'amount',
        'order_id',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public static function add($orderId, $position)
    {
        return self::create([
            'amount'        => $position['amount'],
            'order_id'      => $orderId,
            'product_id'    => $position['id']
        ]);
    }
}
