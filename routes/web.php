<?php

use App\Http\Controllers\divisions\DivisionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/divisiones', [DivisionController::class, 'index']);

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/RecoverPassword', function () {
    return view('auth.recoverPassword');
});