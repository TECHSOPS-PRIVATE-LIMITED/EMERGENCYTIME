<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Equipment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Contracts\View\View;

class EquipmentController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Equipment::class,'equipment');
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
                'name' => 'Equipment',
                'url' => route('equipments.index'),
                'active' => true
            ]
        ];
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $equipments = QueryBuilder::for(Equipment::class)
            ->allowedSorts(['name','last_maintenance_date'])
            ->where('name', 'like', "%$q%")
            ->orWhere('last_maintenance_date', 'like', "%$q%")
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('site.equipments.index',[
            'equipments' => $equipments,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Equipment'
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @returnView
     */
    public function create(): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Equipment',
                'url' => route('equipments.index'),
                'active' => false
            ],
            [
                'name' => 'Create',
                'url' => '#',
                'active' => true
            ],
        ];
        $equipments = Equipment::all();

        return view('site.equipments.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Equipment',
            'equipments' => $equipments,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEquipmentRequest $request
     * @return RedirectResponse
     */
    public function store(StoreEquipmentRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('product_images'), $imageName);

            $validated['image'] = asset('product_images/' . $imageName);
        }
        Equipment::create($validated);
        return redirect()->route('equipments.index')->with('message','Equipment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Equipment $equipment
     * @return View
     */
    public function show(Equipment $equipment): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Equipment',
                'url' => route('equipments.index'),
                'active' => false
            ],
            [
                'name' => 'Show',
                'url' => '#',
                'active' => true
            ]
        ];
        return view('site.equipments.show', [
            'breadcrumbItems' => $breadcrumbsItems,
            'equipment' => $equipment,
            'pageTitle' => 'Show Equipment'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Equipment $equipment
     * @return View
     */
    public function edit(Equipment $equipment) : View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Equipment',
                'url' => route('equipments.index'),
                'active' => false
            ],
            [
                'name' => 'Edit',
                'url' => '#',
                'active' => true
            ]
        ];
        return view('site.equipments.edit', [
            'breadcrumbItems' => $breadcrumbsItems,
            'equipment' => $equipment,
            'pageTitle' => 'Edit Equipment'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEquipmentRequest $request
     * @param Equipment $equipment
     * @return RedirectResponse
     */
    public function update(UpdateEquipmentRequest $request, Equipment $equipment): RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        if ($request->hasFile('image') && $request->file('image')->isValid())
        {
            if ($equipment->image) {
                $imagePath = str_replace(asset(''), '', $equipment->image);
                Storage::disk('public')->delete($imagePath);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Store the new image in the public disk under 'product_images'
            Storage::disk('public')->putFileAs('product_images', $image, $imageName);

            // Update the image path in the validated data
            $validated['image'] = 'storage/product_images/' . $imageName;
        }

        $equipment->update($validated);

        // Redirect back to the index page with a success message
        return redirect()->route('equipments.index')->with('message', 'Equipment updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Equipment $equipment
     * @return RedirectResponse
     */
    public function destroy(Equipment $equipment): RedirectResponse
    {
        $equipment->delete();
        return to_route('equipments.index')->with('message', 'Facility deleted successfully.');

    }
}
