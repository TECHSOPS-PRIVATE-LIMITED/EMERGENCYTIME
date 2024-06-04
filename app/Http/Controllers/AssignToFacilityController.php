<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Facility;
use App\Models\MedicalStaff;
use App\Models\Specialty;
use App\Models\Treatment;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AssignToFacilityController extends Controller
{
    public function index(Facility $facility): View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Assign To Hospitals',
                'url' => route('assign.to.facility.index'),
                'active' => true
            ]
        ];

        $facility = $facility->load('medicalStaffs', 'treatments', 'equipments');
        $facility = $facility->with('country')->first();

        $medicalStaffs = MedicalStaff::with('specialties')->get();
        $treatments = Treatment::with('category')->get();
        $specialties = Specialty::all();
        $equipments = Equipment::all();

        return view('site.assign_to_hospitals.assign_to_hospital', [
            'breadcrumbItems' => $breadcrumbsItems,
            'facility' => $facility,
            'medicalStaffs' => $medicalStaffs,
            'treatments' => $treatments,
            'specialties' => $specialties,
            'equipments' => $equipments,
            'pageTitle' => 'Assign To Hospitals'
        ]);
    }


    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'staff_ids' => 'array',
            'treatment_ids' => 'array',
            'equipment_ids' => 'array',
            'facility_id' => 'exists:facilities,id'
        ]);

        try {
            $facility = Facility::findOrFail($request->input('facility_id'));
            if (!is_null($facility)) {
                $facility->medicalStaffs()->sync($request->input('staff_ids'));
                $facility->treatments()->sync($request->input('treatment_ids'));
                $facility->equipments()->sync($request->input('equipment_ids'));

                return redirect()->route('facilities.index')->with('message', 'Successfully assigned to facility');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('An error occurred while processing your request.');
        }
    }
}
