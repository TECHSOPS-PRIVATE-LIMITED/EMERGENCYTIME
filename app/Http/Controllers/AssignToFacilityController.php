<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AssignToFacilityController extends Controller
{
    public function index() : View
    {
        $breadcrumbsItems = [
            [
                'name' => 'Assign To Hospitals',
                'url' => route('assign.to.facility.index'),
                'active' => true
            ]
        ];
        $countries  = Country::all();
        $specialties = Specialty::all();
        return view('site.assign_to_hospitals.assign_to_hospital',[
            'breadcrumbItems' => $breadcrumbsItems,
            'countries' => $countries,
            'specialties' => $specialties,
            'pageTitle' => 'Assign To Hospitals'
        ]);
    }
}
