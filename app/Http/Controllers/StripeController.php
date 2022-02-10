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


    public function index($amount)
    {
        //ddd($name);

        return view('str', [
            'amount' => $amount,

        ]);

        //return view('str');
    }

    //4242424242424242
    public function makePayment(Request $request, $amount)
    {
        //ddd($amount);
        $time = $amount/8.33;
        $tint = (int)$time;
        $tstr = strval($tint);

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Stripe\Charge::create ([
            "amount" => 100 * $amount,
            "currency" => "ron",
            "source" => $request->stripeToken,
            "description" => "Subscribed for $tstr months."
        ]);

        Session::flash('success', 'Payment successfully made.');

        if($charge->status == 'succeeded') {
            $updateProfile = new ProfilesController();
            $updateProfile->setTimeline($tint);
        }

        return back();
    }
}
