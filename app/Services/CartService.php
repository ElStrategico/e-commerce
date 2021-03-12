<?php

namespace App\Services;

use App\Models\User;
use App\Models\Cart;
use App\Models\Produce\Product;

class CartService
{
    public static function import($orders, User $user)
    {
        if(!$orders)
        {
            return;
        }

        foreach($orders as $order)
        {
            /* @var Product $product */
            $product = Product::find($order['product_id']);
            Cart::add($order['amount'], $user, $product);
        }
    }
}
