<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

Route::get("/" ,[FrontController::class , "index"]);
Route::get("/about" ,[FrontController::class , "about"]);
Route::get("/service" ,[FrontController::class , "service"]);
Route::get("/doctor" ,[FrontController::class , "doctor"]);
Route::get("/appointment" ,[FrontController::class , "appointment"]);
Route::get("/feature" ,[FrontController::class , "feature"]);
Route::get("/testimonial" ,[FrontController::class , "testimonial"]);
Route::get("/error" ,[FrontController::class , "error"]);
Route::get("/contact" ,[FrontController::class , "contact"]);