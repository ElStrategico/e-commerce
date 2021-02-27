<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Produce\Product;
use App\Http\Controllers\Controller;

class PriceController extends Controller
{
    /**
     * GET http://site.local/api/v1/prices
     */
    public function index()
    {
        return [
            'min' => Product::min('price'),
            'max' => Product::max('price')
        ];
    }
}
