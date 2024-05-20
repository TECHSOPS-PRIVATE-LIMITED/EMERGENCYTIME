<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMedicalStaffRequest;
use App\Http\Requests\UpdateMedicalStaffRequest;
use App\Models\MedicalStaff;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Contracts\View\View;

class MedicalStaffController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(MedicalStaff::class, 'medical_staff');
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
                'name' => 'Medical Staff',
                'url' => route('medical_staffs.index'),
                'active' => true
            ]
        ];
        $q = $request->get('q');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        $medicalstaffs = QueryBuilder::for(MedicalStaff::class)
            ->allowedSorts(['name', 'role'])
            ->where('name', 'like', "%$q%")
            ->orWhere('role', 'like', "%$q%")
            ->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort]);

        return view('site.medical_staffs.index', [
            'medicalstaffs' => $medicalstaffs,
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Medical Staff'
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
                'name' => 'Medical Staff',
                'url' => route('medical_staffs.index'),
                'active' => false
            ],
            [
                'name' => 'Create',
                'url' => '#',
                'active' => true
            ],
        ];

        return view('site.medical_staffs.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Medical Staff',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMedicalStaffRequest $request
     * @return RedirectResponse
     */
    public function store(StoreMedicalStaffRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/medical_staff_images', $imageName);

            $validated['image'] = 'storage/medical_staff_images/' . $imageName;
        }
        MedicalStaff::create($validated);
        return redirect()->route('medical_staffs.index')->with('message', 'Medical Staff created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param MedicalStaff $medicalStaff
     * @return View
     */
    public function show(MedicalStaff $medicalStaff): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Medical Staff',
                'url' => route('medical_staffs.index'),
                'active' => false
            ],
            [
                'name' => 'Show',
                'url' => '#',
                'active' => true
            ]
        ];
        return view('site.medical_staffs.show', [
            'breadcrumbItems' => $breadcrumbsItems,
            'medicalStaff' => $medicalStaff,
            'pageTitle' => 'Show Medical Staff'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param MedicalStaff $medicalStaff
     * @return View
     */
    public function edit(MedicalStaff $medicalStaff): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Medical Staff',
                'url' => route('medical_staffs.index'),
                'active' => false
            ],
            [
                'name' => 'Edit',
                'url' => '#',
                'active' => true
            ]
        ];
        return view('site.medical_staffs.edit', [
            'breadcrumbItems' => $breadcrumbsItems,
            'medicalStaff' => $medicalStaff,
            'pageTitle' => 'Edit Medical Staff'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateMedicalStaffRequest $request
     * @param MedicalStaff $medicalStaff
     * @return RedirectResponse
     */
    public function update(UpdateMedicalStaffRequest $request, MedicalStaff $medicalStaff): RedirectResponse
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($medicalStaff->image) {
                $imagePath = str_replace('storage', 'public', $medicalStaff->image);
                Storage::delete($imagePath);
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Store the new image in the public disk under 'medical_staff_images'
            $image->storeAs('public/medical_staff_images', $imageName);

            // Update the image path in the validated data
            $validated['image'] = 'storage/medical_staff_images/' . $imageName;
        }

        $medicalStaff->update($validated);

        // Redirect back to the index page with a success message
        return redirect()->route('medical_staffs.index')->with('message', 'Medical Staff updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param MedicalStaff $medicalStaff
     * @return RedirectResponse
     */
    public function destroy(MedicalStaff $medicalStaff): RedirectResponse
    {
        $medicalStaff->delete();
        return redirect()->route('medical_staffs.index')->with('message', 'Medical Staff deleted successfully.');
    }
}
