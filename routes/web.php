<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicInfoController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ServicController;
use App\Http\Controllers\TestimonialController;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// All Admin Users Route List
Route::middleware(['auth','user-access:admin'])->group(function(){    
    Route::prefix("admin")->group(function(){
        Route::get('home', [HomeController::class, 'index'])->name('home');
        // Route::get('service',[ServiceController::class,'index'])->name('admin.service');
        // Route::get('service/create',[ServiceController::class,'create'])->name('admin.service.create');
        // Route::post('service/store',[ServiceController::class,'store'])->name('admin.service.store');    
        // Route::get('patient',[PatientController::class,'index'])->name('admin.patient.index');
        // Route::get('patient/create',[PatientController::class,'create'])->name('admin.patient.create');
        Route::resource('patient',PatientController::class);
        Route::resource('service',ServicController::class);
        Route::resource('contact',ContactController::class);
        Route::resource('doctor',DoctorController::class);
        Route::resource('appointment',AppointmentController::class);
        Route::resource('testimonial',TestimonialController::class);
        Route::resource('info',ClinicInfoController::class);
    });
});

// All Normal Users Routes List
Route::middleware(['auth','user-access:user'])->group(function(){
    Route::get('/home',[HomeController::class,'index'])->name('home');
});


// All Manager Route List

Route::middleware(['auth','user-access:manager'])->group(function(){
    Route::get('/manager/home',[HomeController::class,'managerHome'])->name('manager.home');
});





Route::get('admin-sample',function(){
    // return view('layouts.admin_app');
    $data['patients']=Patient::get();
    return view('admin.patients.list',$data);
});
Route::get('admin-create',function(){
    // return view('layouts.admin_app');
    $data['patients']=Patient::get();
    return view('admin.patients.create',$data);
})->name('patient.create');


Route::get('send-sms', [NotificationController::class, 'sendSmsNotificaition']);


Route::get('auth_sample',function(){
    return view('auth.auth_master');
});

