<?php

namespace App\Models;

use App\Helpers\IntHelper;

class EmailVerifyToken
{
    /**
     * @param User $user
     * @param string $token
     * @return bool
     */
    public static function check(User $user, $token)
    {
        return $user->email_verify_token === $token;
    }

    /**
     * @return int
     * @throws \Exception
     */
    public static function generate()
    {
        return IntHelper::random();
    }
}
