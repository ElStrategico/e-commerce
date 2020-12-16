<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Models\Produce\Product;
use App\Http\Controllers\Controller;
use App\Models\Produce\ProductSearch;
use App\Models\Produce\ProductOptions;

class ProductController extends Controller
{
    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        $searchEngine = new ProductSearch(
            new ProductOptions($request->input())
        );

        return $searchEngine->search();
    }

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
