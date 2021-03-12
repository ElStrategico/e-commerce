<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderStatus extends Model
{
    use HasFactory;

    const IS_DEFAULT = 1;

    protected $fillable = [
        'name'
    ];

    public static function getDefault()
    {
        return self::where('is_default', self::IS_DEFAULT)->first();
    }
}
