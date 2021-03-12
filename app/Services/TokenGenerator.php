<?php


namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class TokenGenerator
{
    const MIN_LENGTH = 8;
    const MAX_LENGTH = 16;

    /**
     * @return int
     */
    private static function getLength()
    {
        return rand(self::MIN_LENGTH, self::MAX_LENGTH);
    }

    /**
     * @param array $mixin
     * @return string
     */
    public static function generate(array $mixin = [])
    {
        return Str::random(self::getLength());
    }
}
