<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
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
     * Display the Stripe payment form.
     *
     * @return View
     */
    public function stripe(): View
    {
        return view('site.payments.stripe.checkout');
    }

    /**
     * Handle Stripe payment form submission.
     *
     * @param Request $request
     * @return RedirectResponse
     * @throws ApiErrorException
     */

        function stripePost(Request $request): RedirectResponse
        {
            Stripe::setApiKey(env('STRIPE_SECRET'));

            Charge::create([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from Emergency Time."
            ]);

            // Create a subscription record
            Subscription::create([
                'user_id' => auth()->id(),
                'plan_type' => 'Pro',
                'start_date' => now(),
                'end_date' => now()->addMonth(),
                'auto_renew' => true,
                'price' => 100,
                'status' => 'active',
            ]);

            // Flash success message
            Session::flash('success', 'Payment successful!');

            return back();
        }
    }



//Name: Test
//
//Number: 4242 4242 4242 4242

//CVV: 123

//Expiration Month: 12

//Expiration Year: 2028

