<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurlController;
use App\Http\Controllers\SaloonController;

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

Route::get('saloon/current',[SaloonController::class,'current']);
Route::get('saloon/next',[SaloonController::class,'next']);

Route::get('curl/current',[CurlController::class,'current']);
Route::get('curl/next',[CurlController::class,'next']);
