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
            return response()->json([
                'error' => 'Unauthorized'
            ], 401);
        }

        return $this->responseToken($token);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $currentUser = auth()->user();

        return response()->json($currentUser);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $currentUser = auth()->user();

        return $this->responseToken(auth()->refresh());
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $currentUser = auth()->user();
        auth()->logout();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
