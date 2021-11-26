<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        Stripe::setApiKey('sk_test_51K06J9Kob7j1X5crzIqGZkcl2I1tOo38urhaCJ89xUqdNE2AMiljni96SiFxYhVTh1t92UpKNx6Z9Fc3ETYsVnL600SBNtnfpg');
        $intent = PaymentIntent::create([
            'amount' => round(Cart::total()),
            'currency' => 'eur'
        ]);

        $clientSecret = Arr::get($intent, 'client_secret');

        return view('checkout.index', compact('clientSecret'));
    }
}
