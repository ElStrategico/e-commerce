<?php

namespace App\Http\Controllers\API\v1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\EmailVerifyToken;
use App\Http\Controllers\Controller;

class EmailVerifyController extends Controller
{
    public function verify(Request $request)
    {
        /* @var User $user */
        $user = User::find(auth()->id());
        if($user->hasVerifiedEmail())
        {
            return response()->json([
                'message' => 'Already verified'
            ], 401);
        }

        $correctlyToken = EmailVerifyToken::check($user, $request->input('token'));

        if($correctlyToken)
        {
            $user->markEmailAsVerified();
            $user->resetEmailVerifyToken();

            return response()->json([
                'verified' => 'true'
            ]);
        }

        return response()->json([
            'verified' => 'false'
        ], 401);
    }
}
