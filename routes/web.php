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
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\profile\ProfileController;

use App\Http\Controllers\Career\CareerController;

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
    return view('administrator.dashboard.dashboard-general');
});

Route::get('/projectsdash', function(){
    return view('management.project');
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

Route::get('/division/proyecto', [DivisionController::class, 'getProjectsPerDivision']); //Ruta de prueba para mostrar los proyectos por division
Route::resource('/empresas', CompaniesController::class);
Route::resource('divisiones', DivisionController::class);
Route::get('/sanciones', [ManagementUserController::class, 'index']);
Route::resource('vistaproyectos', ViewProjectController::class);

Route::get('/Configurar_Cuenta', [ManagementConfiguration::class, 'index']);
Route::get('/profile', [ProfileController::class,'index']);
Route::get('/roles', [RolesController::class,'index']);


Route::resource('books', BooksController::class);

Route::get('/add-books', function () {
    return view('books-notifications.books.add-books');
});
Route::get('/notifications', function () {
    return view('books-notifications.books.notifications');
});
Route::get('/Users', function () {
    return view('administrator.dashboard.DashboardUsers');
});

Route::get('/teams', function () {
    return view('administrator.dashboard.dashboardTeam');
});

Route::get('/report',[BooksController::class,'listBook'])->name('books.list');
Route::get('/report/pdf',[BooksController::class,'report'])->name('books.reports');


Route::controller(ProjectFormController::class)->group(function (){
    Route::get('/dashboardProjects','index')->name('dashboardProjects');
    Route::get('form', 'create');
});

Route::controller(ProjectController::class)->group(function (){
    Route::get('/Project','index');
});

Route::resource('carreras', CareerController::class);
