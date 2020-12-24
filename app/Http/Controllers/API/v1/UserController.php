<?php

namespace App\Http\Controllers\API\v1;

use App\Models\User;
use App\Logger\Converter;
use Illuminate\Support\Facades\Log;
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

        Log::info(Converter::message([
            'Call'        => 'UserController@create',
            'CreatedUser' => $createdUser->email
        ]));

        return $createdUser;
    }

    public function show(User $user)
    {
        Log::info(Converter::message([
            'Call'     => 'UserController@show',
            'ShowUser' => $user->email
        ]));

        return $user;
    }
}
