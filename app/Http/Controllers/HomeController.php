<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\MedicalStaff;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Analytic Dashboard
     */
    public function index(Request $request)
    {
        $breadcrumbsItems = [
            [
                'name' => 'Home',
                'url' => '/',
                'active' => true
            ],
        ];

        $facilitiesCount = Facility::count();
        $usersCount = User::count();
        $medicalStaffsCount = MedicalStaff::count();

        $now = Carbon::now();
        $startOfMonth = $now->copy()->startOfMonth()->toDateString();
        $endOfMonth = $now->copy()->endOfMonth()->toDateString();
        $startOfYear = $now->copy()->startOfYear()->toDateString();
        $endOfYear = $now->copy()->endOfYear()->toDateString();

        $activeUsersCount = User::whereHas('subscription', fn($q) => $q->where('status', 'active')->whereDate('end_date', '>=', $now))->count();

        $activeUsersCountMonthly = User::whereHas('subscription', fn($q) => $q->where('status', 'active')->whereBetween('end_date', [$startOfMonth, $endOfMonth]))->count();

        $activeUsersCountYearly = User::whereHas('subscription', fn($q) => $q->where('status', 'active')->whereBetween('end_date', [$startOfYear, $endOfYear]))->count();

        return view('Index', [
            'pageTitle' => 'Dashboard',
            'breadcrumbItems' => $breadcrumbsItems,
            'facilitiesCount' => $facilitiesCount,
            'usersCount' => $usersCount,
            'activeUsersCount' => $activeUsersCount,
            'activeUsersCountMonthly' => $activeUsersCountMonthly,
            'activeUsersCountYearly' => $activeUsersCountYearly,
            'medicalStaffsCount' => $medicalStaffsCount
        ]);
    }
}
