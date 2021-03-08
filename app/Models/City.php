<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    const STATUS_WORK = 1;

    protected $fillable = [
        'name',
        'region_code',
        'status'
    ];

    public static function getWorking()
    {
        return self::where('status', self::STATUS_WORK)->get();
    }

    public static function createWorking($attributes)
    {
        $attributes['status'] = self::STATUS_WORK;

        return (new static)->newQuery()->create($attributes);
    }
}
