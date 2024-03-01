<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Companies\CompaniesController;
use App\Http\Controllers\divisions\DivisionController;
use App\Http\Controllers\users\ManagementUserController;
use App\Http\Controllers\projects\ProjectFormController;
use App\Http\Controllers\books\BooksController;


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



Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/RecoverPassword', function () {
    return view('auth.recoverPassword');
});
Route::get('/asesorias', function () {
    return view('consultancy.Dates');
});

Route::get('/divisiones', [DivisionController::class, 'index']);
Route::resource('/companies', CompaniesController::class);
Route::resource('divisiones', DivisionController::class);
Route::get('/sanciones', [ManagementUserController::class, 'index']);
<<<<<<< HEAD
=======
Route::resource('form', ProjectFormController::class);
Route::resource('books', BooksController::class);


>>>>>>> develop

Route::controller(ProjectFormController::class)->group(function (){
    Route::get('/dashboardProjects','index');
    Route::get('form', 'create');
});
