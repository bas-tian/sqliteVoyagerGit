<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ProfilesController;
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
        return view('str');
    }

    public function makePayment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "ron",
            "source" => $request->stripeToken,
            "description" => "Subscribed for 3 months."
        ]);

        Session::flash('success', 'Payment successfully made.');

        if($charge->status == 'succeeded') {
            $updateProfile = new ProfilesController();
            $updateProfile->setTimeline($charge->status);
        }

        return back();
    }
}
