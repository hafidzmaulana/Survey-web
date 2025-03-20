<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveiController;

Route::resource('surveis', SurveiController::class);

Route::get('/', function () {
    return view('welcome');
});