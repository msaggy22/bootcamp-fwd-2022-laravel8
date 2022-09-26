<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;

//backsite
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\SpecialistController;
use App\Http\Controllers\Backsite\ConfigPaymentController;
use App\Http\Controllers\Backsite\ConsultationController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\RoleController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', LandingController::class);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){
    // appointment page
    Route::resource('appointment', AppointmentController::class);
    
    // payment page
    Route::resource('payment', PaymentController::class);

});

Route::group(['prefix' => 'backsite', 'as' => 'backsite', 'middleware' => ['auth:sanctum', 'verified']], function(){

    //dashboard
    Route::resource('dashboard', DashboardController::class);

    //TypeUser
    Route::resource('type_user', TypeUserController::class);

    //Specialist
    Route::resource('specialist', SpecialistController::class);

    // ConfigPayment
    Route::resource('config_payment', ConfigPaymentController::class);

    // Consultation
    Route::resource('consultation', ConsultationController::class);

    // Doctor
    Route::resource('doctor', DoctorController::class);

    // Permission
    Route::resource('permission', PermissionController::class);

    // Role
    Route::resource('role', RoleController::class);

});

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
