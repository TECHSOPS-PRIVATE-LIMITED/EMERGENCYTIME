<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\UpdateProfileRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;

class ProfileApiController extends Controller
{
    public function update(UpdateProfileRequest $request): JsonResponse
    {
            $user = auth()->user();

            $user->update($request->only(['name', 'phone', 'city', 'country_id']));

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                if ($user->photo) {
                    $photoPath = str_replace('storage', 'public', $user->photo);
                    Storage::delete($photoPath);
                }
                $photo = $request->file('photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                $photo->storeAs('public/users_images', $photoName);
                $user->update(['photo' => 'storage/users_images/' . $photoName]);
            }

            return response()->json([
                'message' => 'Profile updated successfully',
                'user' => new UserResource($user)
            ]);
        }
}
