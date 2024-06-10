<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DatabaseBackupController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\MedicalStaffController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\AssignToFacilityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReplicateModelTokenController;

require __DIR__ . '/auth.php';

//Route::get('/', function () {
//    return to_route('login');
//});


Route::get('/', function () {
    return view('site.site');
});

//Route::group(['middleware' => ['auth']], function () {

// stripe payment
Route::controller(StripePaymentController::class)->group(function () {
    Route::get('stripe', 'stripe')->name('stripe');
    Route::post('stripe', 'stripePost')->name('stripe.post');
});

// paypal payment
Route::get('paypal/subscribe', [PayPalController::class, 'createSubscription'])->name('paypal.subscribe');
Route::get('paypal/return', [PayPalController::class, 'returnFromPayPal'])->name('paypal.return');
Route::get('paypal/cancel', [PayPalController::class, 'cancelSubscription'])->name('paypal.cancel');

//<a href="{{ route('paypal.subscribe') }}">Subscribe to Monthly Plan ($10)</a>

//});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'verified']], function () {

    // Dashboards
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard.index');

    // Locale
    Route::get('setlocale/{locale}', SetLocaleController::class)->name('setlocale');

    // User
    Route::resource('users', UserController::class);

    // Permission
    Route::resource('permissions', PermissionController::class)->except(['show']);

    // Roles
    Route::resource('roles', RoleController::class);

    // Profiles
    Route::resource('profiles', ProfileController::class)->only(['index', 'update'])->parameter('profiles', 'user');

    // Env
    Route::singleton('general-settings', GeneralSettingController::class);
    Route::post('general-settings-logo', [GeneralSettingController::class, 'logoUpdate'])->name('general-settings.logo');

    // Database Backup
    Route::resource('database-backups', DatabaseBackupController::class);
    Route::get('database-backups-download/{fileName}', [DatabaseBackupController::class, 'databaseBackupDownload'])->name('database-backups.download');

    // Facility
    Route::resource('facilities',FacilityController::class);

    // Equipments
    Route::resource('equipments',EquipmentController::class);

    // Medical Staff
    Route::resource('medical_staffs',MedicalStaffController::class);

    // Specialty
    Route::resource('specialties',SpecialtyController::class);

    // Treatment
    Route::resource('treatments',TreatmentController::class);

    // Subscription
    Route::resource('subscriptions',SubscriptionController::class);

    // Category
    Route::resource('categories', CategoryController::class);

    //Assign to hospitals
    Route::get('assign-to-facility', [AssignToFacilityController::class, 'index'])->name('assign.to.facility.index');
    Route::post('assign-to-facility', [AssignToFacilityController::class, 'store'])->name('assign.to.facility.store');

    // Store Replicate Token
    Route::post('store_token', [ReplicateModelTokenController::class, 'store_token'])->name('store_token');
    Route::get('create_token', [ReplicateModelTokenController::class, 'create_token'])->name('create_token');
    Route::get('show_token', [ReplicateModelTokenController::class, 'show_token'])->name('show_token');
    Route::delete('delete_token/{token}', [ReplicateModelTokenController::class, 'delete_token'])->name('delete_token');

});