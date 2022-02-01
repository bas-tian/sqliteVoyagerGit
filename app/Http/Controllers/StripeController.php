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
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('str');
    }

    //4242424242424242
    public function makePayment(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Stripe\Charge::create ([
            "amount" => 100 * 100,
            "currency" => "ron",
            "source" => $request->stripeToken,
            "description" => "Subscribed for 6 months."
        ]);

        Session::flash('success', 'Payment successfully made.');

        if($charge->status == 'succeeded') {
            $updateProfile = new ProfilesController();
            $updateProfile->setTimeline($charge->status);
        }

        return back();
    }
}
