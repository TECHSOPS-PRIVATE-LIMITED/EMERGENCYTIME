<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ProfileApiController;
use App\Http\Controllers\Api\EnvironmentController;
use App\Http\Controllers\Api\FacilityApiController;
use App\Http\Controllers\Api\TreatmentApiController;
use App\Http\Controllers\Api\DatabaseBackupController;
use App\Http\Controllers\Api\GeneralSettingsController;
use App\Http\Controllers\Api\SubscriptionApiController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Api\GeneralSettingsMediaController;

/*
 * API Routes
 */

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
// OAuth
Route::post('login-oauth', [AuthController::class, 'social']);

Route::post('forgot-password', [AuthController::class, 'forgotPassword']);

// authenticated routes
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('resend-verification', [AuthController::class, 'resendVerification'])
        ->middleware('throttle:6,1');
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);

    Route::apiSingleton('env', EnvironmentController::class);
    Route::group(['middleware' => 'verified', 'as' => 'api.v1.'], function () {
        Route::post('password-change', [AuthController::class, 'changePassword']);
        Route::apiResource('users', UserController::class);
        Route::delete('users-delete-many', [UserController::class, 'destroyMany']);
        Route::apiResource('permissions', PermissionController::class);
        Route::resource('roles', RoleController::class)->except('edit');
        Route::put('general-settings-images', GeneralSettingsMediaController::class);
        // Database Backup
        Route::apiResource('database-backups', DatabaseBackupController::class)->only(['index', 'destroy']);
        Route::get('database-backups-create', [DatabaseBackupController::class, 'createBackup']);
        Route::get('database-backups-download/{fileName}', [DatabaseBackupController::class, 'databaseBackupDownload']);

        //treatments
        Route::get('/treatments', [TreatmentApiController::class, 'index']);
        Route::get('/treatments/{id}', [TreatmentApiController::class, 'show']);

        //facility
        Route::get('/facilities', [FacilityApiController::class, 'index']);
        Route::get('/facilities/{id}', [FacilityApiController::class, 'show']);

        //subscription
        Route::get('/subscription', [SubscriptionApiController::class, 'index']);
        Route::get('/subscription/{id}', [SubscriptionApiController::class, 'show']);

        // Profile
        Route::post('profile', [ProfileApiController::class, 'update']);
    });
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $user = $request->user();
    $request->fulfill();
    return response()->json(['message' => 'Email verified successfully', 'user' => $user]);
})->middleware(['signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return response()->json(['message' => 'Verification link sent!']);
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// General Settings
Route::get('general-settings', GeneralSettingsController::class);
