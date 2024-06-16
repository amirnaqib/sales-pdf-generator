<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});

Route::post("/generatePdf", [HomeController::class, 'generatePdf']);
Route::get("/viewPdf", [HomeController::class, 'viewOutput']);
