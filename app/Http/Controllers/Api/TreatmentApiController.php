<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TreatmentCollection;
use App\Http\Resources\TreatmentResource;
use App\Models\Treatment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TreatmentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TreatmentCollection
     */
    public function index(Request $request): TreatmentCollection
    {
        try {
            $treatments = Treatment::with('category')->get();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve treatments'], 500);
        }
        return TreatmentCollection::make($treatments);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $treatment = Treatment::find($id);

        if (!$treatment) {
            return response()->json(['error' => 'Treatment not found'], 404);
        }

        return response()->json(['data' => new TreatmentResource($treatment)]);
    }
}
