<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderPosition;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrderRequest;

class OrderController extends Controller
{
    public function store(CreateOrderRequest $request)
    {
        if(!$guest = auth()->guest())
        {
            $request->merge(['user_id' => auth()->id()]);
        }

        /* @var Order $order */
        $order = Order::create($request->input());
        $orderPositions = $request->input('order_positions');

        foreach($orderPositions as $orderPosition)
        {
            OrderPosition::add($order->id, $orderPosition);
            if(!$guest)
            {
                /* @var Cart|null $position */
                $position = Cart::find($orderPosition['position_id']);
                if($position && $position->user_id === auth()->id())
                {
                    $position->archive();
                }
            }
        }

        return $order;
    }
}
