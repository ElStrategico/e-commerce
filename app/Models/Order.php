<?php

namespace App\Models;

use App\Models\Produce\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'city_id',
        'address',
        'phone',
        'email'
    ];

    public function orderPositions()
    {
        return $this->belongsToMany(Product::class);
    }
}
