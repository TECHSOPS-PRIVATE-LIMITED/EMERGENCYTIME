<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Analytic Dashboard
     */
    public function index()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Home',
                'url' => '/',
                'active' => true
            ],
        ];

        return view('Index', [
            'pageTitle' => 'Blank Page',
            'breadcrumbItems' => $breadcrumbsItems
        ]);
    }
}
