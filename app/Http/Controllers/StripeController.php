<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "This payment is tested purpose phpcodingstuff.com"
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }
    public function index()
    {
        return view('welcome');
    }

    public function makePayment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            "amount" => 120 * 100,
            "currency" => "inr",
            "source" => $request->stripeToken,
            "description" => "Make payment and chill."
        ]);

        Session::flash('success', 'Payment successfully made.');

        return back();
    }
}
