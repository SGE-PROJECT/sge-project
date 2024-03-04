<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Companies\CompaniesController;
use App\Http\Controllers\divisions\DivisionController;
use App\Http\Controllers\users\ManagementUserController;
use App\Http\Controllers\projects\ProjectFormController;
use App\Http\Controllers\projects\ViewProjectController;

use App\Http\Controllers\projects\ProjectController;
use App\Http\Controllers\books\BooksController;
use App\Http\Controllers\users\ManagementConfiguration;


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

Route::get('/dashboard', function () {
    return view('administrator.dashboard.dashboard-general');
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
Route::resource('vistaproyectos', ViewProjectController::class);

Route::get('/Configurar_Cuenta', [ManagementConfiguration::class, 'index']);


Route::resource('books', BooksController::class);

Route::controller(ProjectFormController::class)->group(function (){
    Route::get('/dashboardProjects','index');
    Route::get('form', 'create');
});

Route::controller(ProjectController::class)->group(function (){
    Route::get('/Project','index');
});
