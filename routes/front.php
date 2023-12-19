<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PatientController;
use App\Models\Appointment;
use App\Models\ClinicInfo;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Servic;
use App\Models\Testimonial;

Route::get('home', function () {
    $data['appointment']=Appointment::get();
    $data['doctor']=Doctor::get();
    $data['patient']=Patient::get();
    $data['contact']=Contact::get();
    $data['service']=Servic::get();
    $data['testimonial']=Testimonial::get();
    $data['info']=ClinicInfo::get();
    return view('home',$data);
})->name('admin.home');

Route::get("/" ,[FrontController::class , "index"])->name('front.home');
Route::get("/about" ,[FrontController::class , "about"])->name('front.about');
Route::get("/services" ,[FrontController::class , "service"])->name('front.service');
Route::get("/doctor" ,[FrontController::class , "doctor"])->name('front.doctor');
Route::get("/appointment" ,[FrontController::class , "appointment"])->name('front.appointment');
//Route::get('patient',PatientController::class,'patient_appointment')->name('patient.patient_appointment');
Route::get("/feature" ,[FrontController::class , "feature"])->name('front.feacture');
Route::get("/testimonial" ,[FrontController::class , "testimonial"])->name('front.testimonial');
Route::get("/error" ,[FrontController::class , "error"])->name('front.error');
Route::get("/contact" ,[FrontController::class , "contact"])->name('front.contact');