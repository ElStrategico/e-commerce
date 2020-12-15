<?php

namespace App\Http\Controllers\API\v1;

use App\Models\User;
use App\Models\Product;
use App\Models\ProductLike;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductLikeController extends Controller
{
    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Product $product)
    {
        $user = User::find(auth()->id());

        if(ProductLike::likeExists($product, $user))
        {
            return response()->json([
                'message' => 'Like already exists'
            ], 422);
        }

        return ProductLike::like($product, $user);
    }
}
