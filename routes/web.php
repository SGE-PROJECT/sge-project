<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\divisions\DivisionController;
use App\Http\Controllers\users\ManagementUserController;
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

Route::get('/', function () {
    return view('layouts.panel');
});

Route::resource('divisiones', DivisionController::class);
Route::get('/sanciones', [ManagementUserController::class, 'index']);



