<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Subscription;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Exception\ApiErrorException;
use Illuminate\Support\Facades\Log;

class CheckSubscriptions extends Command
{
    protected $signature = 'subscriptions:check';
    protected $description = 'Check subscriptions and handle renewals';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Set the Stripe API key
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $subscriptions = Subscription::where('status', 'active')
            ->where('end_date', '<=', Carbon::now()->addDay())
            ->get();

        foreach ($subscriptions as $subscription) {
            $user = $subscription->user;

            // Notify user before one day
            if ($subscription->end_date->isTomorrow()) {
                $user->notify(new \App\Notifications\SubscriptionExpiryNotification($subscription));
            }

            // Handle renewal on the end date
            if ($subscription->end_date->isToday()) {
                try {
                    $charge = Charge::create([
                        "amount" => $subscription->price * 100,
                        "currency" => "usd",
                        "source" => $user->stripe_token,
                        "description" => "Subscription renewal"
                    ]);

                    // Update subscription
                    $subscription->update([
                        'start_date' => now(),
                        'end_date' => now()->addMonth(),
                        'status' => 'active',
                    ]);
                } catch (ApiErrorException $e) {
                    $subscription->update([
                        'status' => 'inactive',
                        'canceled_at' => now(),
                    ]);

                    Log::error('Subscription renewal failed for user ' . $user->id . ': ' . $e->getMessage());
                }
            }
        }
    }
}
