<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('',[HomeController::class, 'home'])->name('home');

Route::get('gioi-thieu',[HomeController::class, 'about']);