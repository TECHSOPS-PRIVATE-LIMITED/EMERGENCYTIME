<?php

namespace App\Http\Controllers;

use App\Models\ReplicateModelToken;
use Illuminate\Http\Request;

class ReplicateModelTokenController extends Controller
{
    public function index(Request $request)
    {
        $token = ReplicateModelToken::first();

        if ($token) {
            return response()->json(['message' => 'success', 'token' => $token], 200);
        } else {
            return response()->json(['message' => 'No token found'], 404);
        }
    }

    
    public function create_token()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Model Token',
                'url' => route('create_token'),
                'active' => true
            ]
        ];
        return view('site.replicate_model.create', [
            'breadcrumbItems' => $breadcrumbsItems,
            'pageTitle' => 'Create Model Token'
        ]);
    }

    public function store_token(Request $request)
    {
        $request->validate([
            'model_token' => ['nullable', 'string', 'max:255'],
        ]);

        ReplicateModelToken::truncate();
        $token = ReplicateModelToken::create([
            'model_token' => $request->model_token,
        ]);

        return redirect()->route('show_token')->with('message', 'Successfully created model token');
    }

    public function show_token()
    {
        $breadcrumbsItems = [
            [
                'name' => 'Show Model Token',
                'url' => route('show_token'),
                'active' => true
            ]
        ];

        return view('site.replicate_model.show', [
            'breadcrumbItems' => $breadcrumbsItems,
            'token' => ReplicateModelToken::first(),
            'pageTitle' => 'Show Model Token',
        ]);
    }

    public function delete_token(ReplicateModelToken $token)
    {
        $token->delete();

        return redirect()->route('show_token')->with('message', 'Successfully deleted model token');
    }
}