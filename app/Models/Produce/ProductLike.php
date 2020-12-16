<?php

namespace App\Models\Produce;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ProductLike extends Model
{
    protected $fillable = [
        'product_id', 'user_id'
    ];

    public static function likeExists(Product $product, User $user)
    {
        $productLike = self::where('product_id', '=', $product->id)->
                             where('user_id', '=', $user->id)->
                             first();

        return $productLike != null;
    }

    public static function like(Product $product, User $user)
    {
        return self::create([
            'product_id' => $product->id,
            'user_id'    => $user->id
        ]);
    }
}
