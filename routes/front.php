<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;


Route::get('home', function () {
    return view('home');
})->name('admin.home');

Route::get("/" ,[FrontController::class , "index"])->name('front.home');
Route::get("/about" ,[FrontController::class , "about"])->name('front.about');
Route::get("/service" ,[FrontController::class , "service"])->name('front.service');
Route::get("/doctor" ,[FrontController::class , "doctor"])->name('front.doctor');
Route::get("/appointment" ,[FrontController::class , "appointment"])->name('front.appointment');
Route::get("/feature" ,[FrontController::class , "feature"])->name('front.feacture');
Route::get("/testimonial" ,[FrontController::class , "testimonial"])->name('front.testimonial');
Route::get("/error" ,[FrontController::class , "error"])->name('front.error');
Route::get("/contact" ,[FrontController::class , "contact"])->name('front.contact');