<?php

namespace App\Http\Controllers\API\v1;

use App\Models\User;
use App\Services\CartService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    /**
     * @param CreateUserRequest $request
     * @return User
     */
    public function create(CreateUserRequest $request)
    {
        $createdUser = User::create($request->input());

        CartService::import($request->input('orders'), $createdUser);

        return $createdUser;
    }

    public function show(User $user)
    {
        return $user;
    }
}
