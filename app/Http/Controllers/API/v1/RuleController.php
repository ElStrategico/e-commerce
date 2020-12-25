<?php

namespace App\Http\Controllers\API\v1;

use App\Models\User;
use App\Logger\Converter;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class RuleController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());

        return $user->rules;
    }
}
