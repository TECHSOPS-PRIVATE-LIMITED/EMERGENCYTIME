<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\MedicalStaff;
use App\Models\Specialty;
use Illuminate\View\View;

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
        $facility = $facility->with('country')->first();
        $medicalStaffs = MedicalStaff::with('specialties')->get();
        $specialties = Specialty::all();
        return view('site.assign_to_hospitals.assign_to_hospital', [
            'breadcrumbItems' => $breadcrumbsItems,
            'facility' => $facility,
            'medicalStaffs' => $medicalStaffs,
            'specialties' => $specialties,
            'pageTitle' => 'Assign To Hospitals'
        ]);
    }
}
