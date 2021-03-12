<?php

namespace App\Models;

use App\Models\OrderPosition;
use App\Models\Produce\Product;
use App\Services\TokenGenerator;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'city_id',
        'address',
        'phone',
        'email',
        'token',
        'order_status_id'
    ];

    public function orderPositions()
    {
        return $this->hasMany(OrderPosition::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    /**
     * @param array $tokens
     * @param int $limit
     * @return mixed
     */
    public static function findByTokens(array $tokens, $limit = 10)
    {
        return self::with(['orderStatus', 'orderPositions.product'])->whereIn('token', $tokens)->paginate($limit);
    }

    /**
     * @param $userId
     * @param int $limit
     * @return mixed
     */
    public static function findForUser($userId, $limit = 10)
    {
        return self::with('orderStatus', 'orderPositions.product')->where('user_id', $userId)->paginate($limit);
    }

    /**
     * @param array $attributes
     * @return \Illuminate\Database\Eloquent\Builder|Model
     */
    public static function create(array $attributes)
    {
        $attributes['token'] = TokenGenerator::generate();
        $attributes['order_status_id'] = OrderStatus::getDefault()->id;
        $createdOrder = (new static)->newQuery()->create($attributes);
        $orderPositions = $attributes['order_positions'];

        foreach($orderPositions as $orderPosition)
        {
            OrderPosition::add($createdOrder->id, $orderPosition);
            if(!auth()->guest())
            {
                /* @var Cart|null $position */
                $position = Cart::find($orderPosition['position_id']);
                if($position && $position->user_id === auth()->id())
                {
                    $position->archive();
                }
            }
        }

        return $createdOrder;
    }
}
