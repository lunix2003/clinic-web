<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PatientController;


Route::get('home', function () {
    return view('home');
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