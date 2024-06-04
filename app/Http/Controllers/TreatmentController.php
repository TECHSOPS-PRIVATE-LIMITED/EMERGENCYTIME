<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTreatmentRequest;
use App\Http\Requests\UpdateTreatmentRequest;
use App\Models\Category;
use App\Models\Treatment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Contracts\View\View;

class TreatmentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Treatment::class, 'treatment');
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
                'name' => 'Treatments',
                'url' => route('treatments.index'),
                'active' => true,
            ],
        ];

        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);

        $treatments = QueryBuilder::for(Treatment::class)
            ->allowedSorts(['disease_name', 'description', 'created_at'])
            ->orWhere('disease_name', 'like', "%$q%")
            ->orWhere('description', 'like', "%$q%")
            ->orWhere('created_at', 'like', "%$q%")
            ->with('category')
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q]);

        return view('site.treatments.index', [
            'treatments' => $treatments,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Treatments',
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
                'name' => 'Treatments',
                'url' => route('treatments.index'),
                'active' => false,
            ],
            [
                'name' => 'Create',
                'url' => '#',
                'active' => true,
            ],
        ];
        $categories = Category::all();
        return view('site.treatments.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'categories' => $categories,
            'pageTitle' => 'Create Treatment',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTreatmentRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTreatmentRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        Treatment::create($validated);
        return redirect()->route('treatments.index')->with('message', 'Treatment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Treatment $treatment
     * @return View
     */
    public function show(Treatment $treatment): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Treatments',
                'url' => route('treatments.index'),
                'active' => false,
            ],
            [
                'name' => 'Show',
                'url' => '#',
                'active' => true,
            ],
        ];

        return view('site.treatments.show', [
            'breadcrumbItems' => $breadcrumbsItems,
            'treatment' => $treatment->load('category'),
            'pageTitle' => 'Show Treatment',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Treatment $treatment
     * @return View
     */
    public function edit(Treatment $treatment): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Treatments',
                'url' => route('treatments.index'),
                'active' => false,
            ],
            [
                'name' => 'Edit',
                'url' => '#',
                'active' => true,
            ],
        ];

        $categories = Category::all();
        return view('site.treatments.edit', [
            'breadcrumbItems' => $breadcrumbsItems,
            'treatment' => $treatment,
            'categories' => $categories,
            'pageTitle' => 'Edit Treatment',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTreatmentRequest $request
     * @param Treatment $treatment
     * @return RedirectResponse
     */
    public function update(UpdateTreatmentRequest $request, Treatment $treatment): RedirectResponse
    {
        $validated = $request->validated();
        $treatment->update($validated);

        return redirect()->route('treatments.index')->with('message', 'Treatment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Treatment $treatment
     * @return RedirectResponse
     */
    public function destroy(Treatment $treatment): RedirectResponse
    {
        $treatment->delete();
        return redirect()->route('treatments.index')->with('message', 'Treatment deleted successfully.');
    }
}

