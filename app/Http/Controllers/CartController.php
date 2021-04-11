<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    static function cartItem()
    {
        return Cart::all()->count();
    }
}
