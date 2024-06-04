<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SubscriptionCollection;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionApiController extends Controller
{
    public function index(Request $request)
    {
        try {
            $subscriptions = Subscription::all();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve subscriptions'], 500);
        }
        return  SubscriptionCollection::make($subscriptions);
    }

}
