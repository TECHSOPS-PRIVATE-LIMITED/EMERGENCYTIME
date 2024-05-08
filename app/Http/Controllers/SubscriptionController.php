<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Subscription::class, 'subscription');
    }

    /**
     * Display a listing of subscriptions.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $breadcrumbsItems = [
            ['name' => 'Subscriptions', 'url' => route('subscriptions.index'), 'active' => true],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);

        $subscriptions = QueryBuilder::for(Subscription::class)
            ->allowedSorts(['plan_type', 'start_date', 'end_date'])
            ->allowedFilters([
                AllowedFilter::partial('plan_type'),
                AllowedFilter::partial('status'),
            ])
            ->with('user')
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q]);

        return view('site.subscriptions.index', [
            'subscriptions' => $subscriptions,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Subscriptions',
        ]);
    }

    /**
     * Show the form for creating a new subscription.
     *
     * @return View
     */
    public function create(): View
    {
        $breadcrumbsItems = [
            ['name' => 'Subscriptions', 'url' => route('subscriptions.index'), 'active' => false],
            ['name' => 'Create', 'url' => '#', 'active' => true],
        ];

        return view('subscriptions.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Subscription',
        ]);
    }

    /**
     * Store a newly created subscription in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'plan_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'auto_renew' => 'sometimes|boolean',
            'price' => 'required|numeric|min:0',
        ]);

        $validated['user_id'] = Auth::id();

        Subscription::create($validated);

        return redirect()->route('subscriptions.index')
            ->with('message', 'Subscription created successfully.');
    }

    /**
     * Display a specific subscription.
     *
     * @param Subscription $subscription
     * @return View
     */
    public function show(Subscription $subscription): View
    {
        $breadcrumbsItems = [
            ['name' => 'Subscriptions', 'url' => route('subscriptions.index'), 'active' => false],
            ['name' => 'Show', 'url' => '#', 'active' => true],
        ];

        return view('site.subscriptions.show', [
            'subscription' => $subscription,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Subscription Details',
        ]);
    }

    /**
     * Show the form for editing a specific subscription.
     *
     * @param Subscription $subscription
     * @return View
     */
    public function edit(Subscription $subscription): View
    {
        $breadcrumbsItems = [
            ['name' => 'Subscriptions', 'url' => route('subscriptions.index'), 'active' => false],
            ['name' => 'Edit', 'url' => '#', 'active' => true],
        ];

        return view('subscriptions.edit', [
            'subscription' => $subscription,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Edit Subscription',
        ]);
    }

    /**
     * Update a specific subscription in storage.
     *
     * @param Request $request
     * @param Subscription $subscription
     * @return RedirectResponse
     */
    public function update(Request $request, Subscription $subscription): RedirectResponse
    {
        $validated = $request->validate([
            'plan_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'auto_renew' => 'sometimes|boolean',
            'price' => 'required|numeric|min:0',
        ]);

        $subscription->update($validated);

        return redirect()->route('subscriptions.index')
            ->with('message', 'Subscription updated successfully.');
    }

    /**
     * Remove a specific subscription from storage.
     *
     * @param Subscription $subscription
     * @return RedirectResponse
     */
    public function destroy(Subscription $subscription): RedirectResponse
    {
        $subscription->delete();

        return redirect()->route('subscriptions.index')
            ->with('message', 'Subscription deleted successfully.');
    }
}
