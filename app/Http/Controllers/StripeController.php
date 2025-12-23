<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use App\Models\Product;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use App\Mail\PaymentSuccessMail;
use Illuminate\Support\Facades\Mail;

class StripeController extends Controller
{
    // payment method
    public function pay(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));


        // ✅ SERVER SIDE amount (example)
        $amount = session('cart_grand_total'); // dollar

        // 🔐 Safety check
        if (!$amount || $amount < 0.5) {
            return response()->json([
                'error' => 'Invalid payment amount.'
            ], 400);
        }


        try {
            $intent = PaymentIntent::create([
                'amount' => intval($amount * 100), // cent
                'currency' => 'usd',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);

            return response()->json([
                'clientSecret' => $intent->client_secret
            ]);


        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }

    }



    // Payment success method
    public function success(Request $request)
    {


        $cart = session('cart', []);

        // ✅ Decrement product stock
        foreach ($cart as $productId => $item) {
            Product::where('id', $productId)
                ->decrement('stock', $item['quantity']);
        }

        // Mail::to($email)->send(new PaymentSuccessMail($cart, $grandTotal));



        // ✅ Clear sessions
        session()->forget('cart');
        session()->forget('cart_grand_total');

        return response()->json(['success' => true]);
    }

}
