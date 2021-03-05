<?php

namespace App\Helpers;


class IntHelper
{
    /**
     * @return int
     * @throws \Exception
     */
    public static function random()
    {
        return random_int(1000, 9999);
    }
}
