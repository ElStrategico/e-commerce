<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\OrderPosition;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if(!auth()->guest())
        {
            return Order::findForUser(auth()->id());
        }
        else
        {
            $tokens = $request->input('tokens') ?? [];
            return Order::findByTokens($tokens);
        }
    }

    public function store(CreateOrderRequest $request)
    {
        if(!$guest = auth()->guest())
        {
            $request->merge(['user_id' => auth()->id()]);
        }

        return Order::create($request->input());
    }
}
