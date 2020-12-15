<?php

namespace App\Http\Controllers\API\v1;

use App\Models\User;
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
        return User::create($request->input());
    }

    public function show(User $user)
    {
        return $user;
    }
}
