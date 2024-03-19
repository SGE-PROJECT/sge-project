<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middlewares;

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

//import test
use App\Http\Controllers\AdvisorySessionController;
use App\Http\Controllers\ProjectsTestController;
use App\Http\Controllers\ProjectStudentsTestController;
use App\Http\Controllers\UsersTestController;


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

Route::get('/proyectos', function(){
    return view('management.project');
});



//Cosas necesarias para el login
Route::middleware(['guest'])->group(function () {
    Route::get('/Iniciar-sesión', [LoginControlller::class, 'index'])->name('login');
    Route::post('/Iniciar-sesión', [LoginControlller::class, 'store']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

    Route::middleware(['role:Administrator'])->group(function () {
        // Rutas para administradores
        Route::get('/projectsdash', function () {
            return view('management.project');
        });
    });

    //modulo administrativo
    Route::resource('roles-permisos', RolesController::class)->names('roles.permissions');



    //Inicia Modulo de Divisiones, Empresas y Carreras conjuntas en proyectos por division.

    //-----

    // Se acaba Modulo de Divisiones, Empresas y Carreras conjuntas en proyectos por division.


    Route::get('/sanciones', [ManagementUserController::class, 'index']);

    Route::get('/Configurar_Cuenta', [ManagementConfiguration::class, 'index']);
    Route::get('/perfil', [ProfileController::class,'index']);
    Route::get('/registrar-usuario', [RegisterUserController::class,'index']);


        Route::get('libros/{slug}', [BooksController::class, 'show'])->name('libros.show');
    Route::resource('libros', BooksController::class);

    Route::get('/añadir.libros', function () {
        return view('books-notifications.books.add-books');
    })->name('añadir.libros');

    Route::get('/notificaciones', function () {
        return view('books-notifications.notifications');
    });
    Route::get('/usuarios', function () {
        return view('administrator.dashboard.DashboardUsers');
    });

    Route::get('/equipos', function () {
        return view('administrator.dashboard.dashboardTeam');
    });

    Route::get('/reporte',[BooksController::class,'listBook'])->name('books.list');
    Route::get('/reporte/pdf',[BooksController::class,'report'])->name('books.reports');

    /*Modulo de proyectos*/
    Route::get('projectdashboard', [ProjectController::class, 'index'])->name('dashboardProjects');
    Route::get('proyectoinvitacion', [ProjectController::class, 'invitation']);
    Route::get('projectform', [ProjectController::class, 'projectform'])->name('projectform');
    Route::post('projectform', [ProjectController::class, 'store']);
    Route::get('vistaproyectos', [ProjectController:: class, 'viewproject'])->name('viewproject');
    Route::get('proyectoequipos', [ProjectController:: class, 'projectteams'])->name('projectteams');


    Route::get('/recuperar-contraseña', function () {
        return view('auth.recoverPassword');
    });

    Route::get('/asesorias', function () {
        return view('consultancy.Dates');
    })->name('asesorias');

    Route::get('/asesorias/dashboard', function(){
        return view('consultancy.Dashboard');
    });

});




//PRUEBA DE PROTECCIÖN DE RUTAS, NO TOCAR
// Rutas protegidas por el rol Adviser
Route::middleware(['auth', 'role:Adviser'])->group(function () {
    // Ruta de prueba para mostrar los proyectos por división
    Route::get('/division/proyecto', [DivisionController::class, 'getProjectsPerDivision']);

    // Rutas protegidas por el rol Teacher usando resource()
    Route::resource('/empresas', CompaniesController::class);
    Route::resource('/divisiones', DivisionController::class);
    Route::resource('/carreras', CareerController::class);
});


// //Base para proteger sus rutas, solo pongan el rol lógico  y cambien sus slash (Como se ve arriba)
// Route::middleware(['auth', 'role:Teacher'])->group(function () {
//     Route::get('/division/proyecto', [DivisionController::class, 'getProjectsPerDivision']);

//     // Rutas protegidas por el rol Teacher usando resource()
//     Route::resource('/empresas', CompaniesController::class);
//     Route::resource('/divisiones', DivisionController::class);
//     Route::resource('/carreras', CareerController::class);
// });

// Route::middleware(['auth', 'role:'])->group(function () {
//     // Ruta de prueba para mostrar los proyectos por división
//     Route::get('/division/proyecto', [DivisionController::class, '']);

//     // Rutas protegidas por el rol Teacher usando resource()
//     Route::resource('/', CompaniesController::class);
//     Route::resource('/', DivisionController::class);
//     Route::resource('/', CareerController::class);
// });

// Route::middleware(['auth', 'role:'])->group(function () {
//     // Ruta de prueba para mostrar los proyectos por división
//     Route::get('/division/proyecto', [DivisionController::class, '']);

//     // Rutas protegidas por el rol Teacher usando resource()
//     Route::resource('/', CompaniesController::class);
//     Route::resource('/', DivisionController::class);
//     Route::resource('/', CareerController::class);
// });



//Test no tocar son de Alfonso
Route::get('/datos-citas', [AdvisorySessionController::class, 'index']);




















































































































































































































































































































































































































Route::get('/all-projects', [ProjectsTestController::class, 'index']);

Route::get('/proyecto/{projectId}/estudiante', [ProjectStudentsTestController::class, 'index']);

Route::get('/users', [UsersTestController::class, 'index']);
Route::post('/advisory-sessions', [AdvisorySessionController::class, 'store']);
Route::put('/advisory-sessions/{id}', [AdvisorySessionController::class, 'update']);
Route::delete('/advisory-sessions/{id}', [AdvisorySessionController::class, 'destroy']);