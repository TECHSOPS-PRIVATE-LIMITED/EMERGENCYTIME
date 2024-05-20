<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use App\Models\Country;
use App\Models\Facility;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;

class FacilityController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Facility::class, 'facility');
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Facility',
                'url' => route('facilities.index'),
                'active' => true
            ],
        ];
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $facilities = QueryBuilder::for(Facility::class)
            ->allowedSorts(['name', 'email', 'phone_number', 'state_province', 'zip_postal_code', 'emergency_contact', 'city'])
            ->where('name', 'like', "%$q%")
            ->orWhere('email', 'like', "%$q%")
            ->orWhere('phone_number', 'like', "%$q%")
            ->orWhere('state', 'like', "%$q%")
            ->orWhere('postal_code', 'like', "%$q%")
            ->orWhere('emergency_contact', 'like', "%$q%")
            ->orWhere('city', 'like', "%$q%")
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('site.facilities.index', [
            'facilities' => $facilities,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Facility'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $countries = Country::all();
        $breadcrumbsItems = [
            [
                'name' => 'Facilities',
                'url' => route('facilities.index'),
                'active' => false
            ],
            [
                'name' => 'Create',
                'url' => route('facilities.create'),
                'active' => true
            ],
        ];
        return view('site.facilities.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'countries' => $countries,
            'pageTitle' => 'Create Facility'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFacilityRequest $request
     * @return RedirectResponse
     */
    public function store(StoreFacilityRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        $facility = Facility::create($validated);
        return to_route('facilities.index')->with('message', 'Facility created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param Facility $facility
     * @return View
     */
    public function show(Facility $facility): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Facilities',
                'url' => route('facilities.index'),
                'active' => false
            ],
            [
                'name' => 'Show Facility',
                'url' => '#',
                'active' => true
            ],
        ];

        return view('site.facilities.show', [
            'breadcrumbItems' => $breadcrumbsItems,
            'facility' => $facility,
            'pageTitle' => 'Show Facility'
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Facility $facility
     * @return View
     */
    public function edit(Facility $facility): View
    {
        $countries = Country::select(['id', 'name'])->get();
        $breadcrumbsItems = [
            [
                'name' => 'Facilities',
                'url' => route('facilities.index'),
                'active' => false
            ],
            [
                'name' => 'Edit Facility',
                'url' => '#',
                'active' => true
            ],
        ];

        return view('site.facilities.edit', [
            'breadcrumbItems' => $breadcrumbsItems,
            'facility' => $facility,
            'countries' => $countries,
            'pageTitle' => ' Facility'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFacilityRequest $request
     * @param Facility $facility
     * @return RedirectResponse
     */
    public function update(UpdateFacilityRequest $request, Facility $facility): RedirectResponse
    {
        $validated = $request->validated();
        $facility->update($validated);
        return to_route('facilities.index')->with('message', 'Facility updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Facility $facility
     * @return RedirectResponse
     */
    public function destroy(Facility $facility): RedirectResponse
    {
        $facility->delete();
        return to_route('facilities.index')->with('message', 'Facility deleted successfully.');
    }
}
