<?php

namespace App\Http\Controllers\API\v1;

use App\Logger\Converter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $token = auth()->attempt($credentials);

        if(!$token)
        {
            Log::notice(Converter::message([
                'Call'       => 'AuthController@login',
                'Authorized' => 'false',
                'User'       => $credentials['email']
            ]));

            return response()->json([
                'error' => 'Unauthorized'
            ], 401);
        }

        Log::info(Converter::message([
            'Call'       => 'AuthController@login',
            'Authorized' => 'true',
            'User'       => $credentials['email']
        ]));

        return $this->responseToken($token);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $currentUser = auth()->user();

        Log::info(Converter::message([
            'Call'        => 'AuthController@me',
            'CurrentUser' => $currentUser->email
        ]));

        return response()->json($currentUser);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $currentUser = auth()->user();

        Log::info(Converter::message([
            'Call'        => 'AuthController@refresh',
            'CurrentUser' => $currentUser->email
        ]));

        return $this->responseToken(auth()->refresh());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $currentUser = auth()->user();
        auth()->logout();

        Log::info(Converter::message([
            'Call' => 'AuthController@logout',
            'CurrentUser' => $currentUser->email
        ]));

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
