<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpecialtyRequest;
use App\Http\Requests\UpdateSpecialtyRequest;
use App\Models\Specialty;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Contracts\View\View;

class SpecialtyController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Specialty::class, 'specialty');
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
                'name' => 'Specialties',
                'url' => route('specialties.index'),
                'active' => true,
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);

        $specialties = QueryBuilder::for(Specialty::class)
            ->allowedSorts(['name', 'created_at'])
            ->where('name', 'like', "%$q%")
            ->where('created_at', 'like', "%$q%")
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q]);

        return view('site.specialties.index', [
            'specialties' => $specialties,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Specialties',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Specialties',
                'url' => route('specialties.index'),
                'active' => false,
            ],
            [
                'name' => 'Create',
                'url' => '#',
                'active' => true,
            ],
        ];

        return view('site.specialties.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Specialty',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSpecialtyRequest $request
     * @return RedirectResponse
     */
    public function store(StoreSpecialtyRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        Specialty::create($validated);

        return redirect()->route('specialties.index')->with('message', 'Specialty created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Specialty $specialty
     * @return View
     */
    public function show(Specialty $specialty): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Specialties',
                'url' => route('specialties.index'),
                'active' => false,
            ],
            [
                'name' => 'Show',
                'url' => '#',
                'active' => true,
            ],
        ];

        return view('site.specialties.show', [
            'breadcrumbItems' => $breadcrumbsItems,
            'specialty' => $specialty,
            'pageTitle' => 'Show Specialty',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Specialty $specialty
     * @return View
     */
    public function edit(Specialty $specialty): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Specialties',
                'url' => route('specialties.index'),
                'active' => false,
            ],
            [
                'name' => 'Edit',
                'url' => '#',
                'active' => true,
            ],
        ];

        return view('site.specialties.edit', [
            'breadcrumbItems' => $breadcrumbsItems,
            'specialty' => $specialty,
            'pageTitle' => 'Edit Specialty',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSpecialtyRequest $request
     * @param Specialty $specialty
     * @return RedirectResponse
     */
    public function update(UpdateSpecialtyRequest $request, Specialty $specialty): RedirectResponse
    {
        $validated = $request->validated();

        $specialty->update($validated);

        return redirect()->route('specialties.index')->with('message', 'Specialty updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Specialty $specialty
     * @return RedirectResponse
     */
    public function destroy(Specialty $specialty): RedirectResponse
    {
        $specialty->delete();
        return redirect()->route('specialties.index')->with('message', 'Specialty deleted successfully.');
    }
}
