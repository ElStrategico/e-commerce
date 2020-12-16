<?php

namespace App\Http\Controllers\API\v1;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->id());

        return $user->carts()->where('archive', '=', !Cart::ARCHIVE)->get();
    }
}
