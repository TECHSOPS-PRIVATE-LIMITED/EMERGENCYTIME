<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal;

class PayPalController extends Controller
{
    public function createSubscription(Request $request): RedirectResponse
    {
        $paypal = resolve(PayPal::class);

        $plan = $paypal->createSubscriptionPlan([
            'name' => 'Monthly Subscription',
            'description' => 'Monthly subscription for $10',
            'amount' => [
                'currency' => 'USD',
                'value' => 10.00
            ],
            'interval' => 'month',
            'cycles' => 0, // unlimited cycles
            'frequency' => 1
        ]);

        $approvalUrl = $paypal->createSubscriptionApproval([
            'plan_id' => $plan->id,
            'return_url' => route('paypal.return'),
            'cancel_url' => route('paypal.cancel')
        ]);

        return redirect($approvalUrl);
    }

    public function returnFromPayPal(Request $request): RedirectResponse
    {
        $paypal = resolve(PayPal::class);

        $subscription = $paypal->getSubscriptionDetails($request->token);

        // Update user subscription status in your database
        // ...

        return redirect()->route('home');
    }

    public function cancelSubscription(Request $request): RedirectResponse
    {
        // Update user subscription status in your database
        // ...

        return redirect()->route('home');
    }
}
