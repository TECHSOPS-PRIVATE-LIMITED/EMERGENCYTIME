<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\SubscriptionCollection;
use App\Http\Resources\SubscriptionResource;
use Symfony\Component\HttpFoundation\JsonResponse;

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

    public function show($id): JsonResponse
    {
        $subscription = Subscription::find($id);

        if (!$subscription) {
            return response()->json(['error' => 'Subscription not found'], 404);
        }

        return response()->json(['data' => new SubscriptionResource($subscription)]);
    }
}
