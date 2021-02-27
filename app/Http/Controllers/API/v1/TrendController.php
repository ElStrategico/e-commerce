<?php

namespace App\Http\Controllers\API\v1;

use Illuminate\Http\Request;
use App\Models\Produce\Product;
use App\Http\Controllers\Controller;

class TrendController extends Controller
{
    public function index(Request $request)
    {
        return Product::trend();
    }
}
