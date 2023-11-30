<?php

namespace App\Http\Controllers\Fe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\Cart;
use Auth;

class OlderController extends Controller
{
    public function checkout(Cart $cart) {
        $user = Auth::user();
        return view('fe.cart.checkout',compact('cart','user'));
    }
    public function checkoutSuccess() {
        return view('fe.cart.checkoutSuccess');
    }
}
