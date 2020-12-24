<?php

namespace App\Http\Controllers\API\v1;

use App\Logger\Converter;
use Illuminate\Http\Request;
use App\Models\Produce\Product;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Produce\ProductSearch;
use App\Models\Produce\ProductOptions;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;

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

        $products = $searchEngine->search();

        Log::info(Converter::message([
            'Call'             => 'ProductController@index',
            'SearchedProducts' => $products->count()
        ]));

        return $products;
    }

    /**
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Product $product)
    {
        $product->category;
        foreach($product->models as $model)
        {
            $model->details;
        }
        $product->images;
        $product->videos;
        $product->details;

        $product->increaseViews();

        Log::info(Converter::message([
            'Call'    => 'ProductController@show',
            'Product' => $product->id
        ]));

        return $product;
    }

    /**
     * @param CreateProductRequest $request
     * @return Product
     */
    public function store(CreateProductRequest $request)
    {
        $request->merge(['user_id' => auth()->id()]);
        $createProduct = Product::create($request->input());

        Log::info(Converter::message([
            'Call'    => 'ProductController@store',
            'Product' => $createProduct->id,
            'User'    => auth()->id()
        ]));

        return $createProduct;
    }

    /**
     * @param Product $product
     * @param UpdateProductRequest $request
     * @return Product
     */
    public function update(Product $product, UpdateProductRequest $request)
    {
        $product->update($request->input());

        Log::info(Converter::message([
            'Call'    => 'ProductController@update',
            'Product' => $product->id,
            'User'    => auth()->id()
        ]));

        return $product;
    }

    /**
     * @param Product $product
     * @return Product
     */
    public function delete(Product $product)
    {
        $product->delete();

        Log::info(Converter::message([
            'Call'    => 'ProductController@delete',
            'Product' => $product->id,
            'User'    => auth()->id()
        ]));

        return $product;
    }
}
