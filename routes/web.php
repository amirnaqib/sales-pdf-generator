<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});

Route::get("/generatePdf", [HomeController::class, 'generatePdf']);
Route::post("/submitPdf", [HomeController::class, 'submitToPDF']);
Route::get("/viewPdf", [HomeController::class, 'viewOutput']);
