<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return View
     */
    public function stripe(): View
    {
        return view('site.stripe.checkout');
    }

    /**
     * success response method.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ApiErrorException
     */
    public function stripePost(Request $request): RedirectResponse
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        Charge::create ([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from Emergency Time."
        ]);

        Session::flash('success', 'Payment successful!');
        return back();
    }
}

//Name: Test
//
//Number: 4242 4242 4242 4242
//
//CVV: 123
//
//Expiration Month: 12
//
//Expiration Year: 2028
//
