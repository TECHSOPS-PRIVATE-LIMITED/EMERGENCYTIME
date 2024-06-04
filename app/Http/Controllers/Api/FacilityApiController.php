<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FacilityCollection;
use App\Http\Resources\FacilityResource;
use App\Models\Facility;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FacilityApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return FacilityCollection
     */
    public function index(Request $request): FacilityCollection
    {
        try {
            $facilities = Facility::all();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to retrieve facilities'], 500);
        }
        return  FacilityCollection::make($facilities);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $facility = Facility::find($id);

        if (!$facility) {
            return response()->json(['error' => 'Facility not found'], 404);
        }

        return response()->json(['data' => new FacilityResource($facility)]);
    }
}
