<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\auth\PostController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\auth\LoginControlller;

use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\books\BooksController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Career\CareerController;
use App\Http\Controllers\profile\ProfileController;

use App\Http\Controllers\projects\ProjectController;
use App\Http\Controllers\divisions\DivisionController;
use App\Http\Controllers\users\RegisterUserController;
use App\Http\Controllers\Companies\CompaniesController;
use App\Http\Controllers\users\ManagementConfiguration;
use App\Http\Controllers\projects\ProjectFormController;
use App\Http\Controllers\projects\ViewProjectController;
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
    return view('administrator.dashboard.dashboard-general');
});

Route::get('/projectsdash', function(){
    return view('management.project');
});



//Cosas necesarias para el login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginControlller::class, 'index'])->name('login');
    Route::post('/login', [LoginControlller::class, 'store']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


    //Inicia Modulo de Divisiones, Empresas y Carreras conjuntas en proyectos por division.

    Route::get('/division/proyecto', [DivisionController::class, 'getProjectsPerDivision']); //Ruta de prueba para mostrar los proyectos por division.
    Route::resource('/empresas', CompaniesController::class);
    Route::resource('/divisiones', DivisionController::class);
    Route::resource('/carreras', CareerController::class);

    // Se acaba Modulo de Divisiones, Empresas y Carreras conjuntas en proyectos por division.


    Route::get('/sanciones', [ManagementUserController::class, 'index']);

    Route::get('/Configurar_Cuenta', [ManagementConfiguration::class, 'index']);
    Route::get('/profile', [ProfileController::class,'index']);
    Route::get('/roles', [RolesController::class,'index']);
    Route::get('/registeruser', [RegisterUserController::class,'index']);



    Route::resource('books', BooksController::class);

    Route::get('/add-books', function () {
        return view('books-notifications.books.add-books');
    })->name('añadir.libros');

    Route::get('/notifications', function () {
        return view('books-notifications.books.notifications');
    });
    Route::get('/usuarios', function () {
        return view('administrator.dashboard.DashboardUsers');
    });

    Route::get('/equipos', function () {
        return view('administrator.dashboard.dashboardTeam');
    });

    Route::get('/report',[BooksController::class,'listBook'])->name('books.list');
    Route::get('/report/pdf',[BooksController::class,'report'])->name('books.reports');

    /*Modulo de proyectos*/
    Route::get('projectdashboard', [ProjectController::class, 'index'])->name('dashboardProjects');
    Route::get('projectinvitation', [ProjectController::class, 'invitation']);
    Route::get('projectform', [ProjectController::class, 'projectform'])->name('projectform');
    Route::post('projectform', [ProjectController::class, 'store']);
    Route::get('vistaproyectos', [ProjectController:: class, 'viewproject'])->name('viewproject');
    Route::get('projecteams', [ProjectController:: class, 'projectteams'])->name('projectteams');
    

    Route::get('/RecoverPassword', function () {
        return view('auth.recoverPassword');
    });
    Route::get('/Asesorias', function () {
        return view('consultancy.Dates');
    });

});








