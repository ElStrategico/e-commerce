<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product)
    {
        $product->category;
        $product->images;
        $product->videos;

        $product->increaseViews();

        return $product;
    }
}
