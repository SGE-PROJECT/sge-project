<?php

use App\Http\Controllers\auth\ForgotPasswordController;


use Spatie\Permission\Middlewares;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\StudentController;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\auth\PostController;
use App\Http\Controllers\MasiveAddController;
use App\Http\Controllers\UsersTestController;

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\auth\LoginControlller;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\books\BooksController;
use App\Http\Controllers\ProjectLikeController;
use App\Http\Controllers\ProjectsTestController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Career\ProgramController;
use App\Http\Controllers\AdvisoryReportsController;

//import test
use App\Http\Controllers\AdvisorySessionController;
use App\Http\Controllers\profile\ProfileController;
use App\Http\Controllers\projects\ProjectController;
use App\Http\Controllers\divisions\DivisionController;
use App\Http\Controllers\users\RegisterUserController;
use App\Http\Controllers\Companies\CompaniesController;
use App\Http\Controllers\ProjectStudentsTestController;
use App\Http\Controllers\users\ManagementConfiguration;
use App\Http\Controllers\projects\ProjectFormController;
use App\Http\Controllers\projects\ViewProjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AcademicAdvisorController;
use App\Http\Controllers\studentDash\StudentDashController;
use App\Http\Controllers\users\ManagementUserController;
use App\Http\Controllers\studentDash\projectsDivisionController;


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

//Cosas necesarias para el login
Route::middleware(['guest'])->group(function () {
    Route::get('/Iniciar-sesion', [LoginControlller::class, 'index'])->name('login');
    Route::post('/Iniciar-sesion', [LoginControlller::class, 'store']);
    Route::get('/registro', [RegisterController::class, 'index'])->name('register');
    Route::post('/registro', [RegisterController::class, 'store']);

    //Recuperar contraseña
    Route::get('/recuperar-contraseña', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/recuperar-contraseña', [ForgotPasswordController::class, 'sendPassword'])->name('password.email');


});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

    /*     Route::middleware(['role:SuperAdmin'])->group(function () {
     */        // Rutas para administradores
    Route::get('/projectsdash', function () {
        return view('management.project');
    });
    /* }); */

    //modulo administrativo
    Route::resource('roles-permisos', RolesController::class)->names('roles.permissions');
    Route::resource('gestion-usuarios', CrudUserController::class)->names([
        'index' => 'users.cruduser.index',
        'create' => 'users.cruduser.create',
        'store' => 'users.cruduser.store',
        'show' => 'users.cruduser.show',
        'edit' => 'users.cruduser.edit',
        'update' => 'users.cruduser.update',
        'destroy' => 'users.cruduser.destroy',
    ]);
    // Ruta específica para la actualización de usuarios
    Route::put('gestion-usuarios/{user}', [CrudUserController::class, 'update'])->name('users.cruduser.update');
    Route::resource('gestion-usuarios-masiva', MasiveAddController::class)->names([
        'index' => 'users.masiveadd.index',
        'create' => 'users.masiveadd.create',
        'store' => 'users.masiveadd.store',
        'show' => 'users.masiveadd.show',
        'edit' => 'users.masiveadd.edit',
        'update' => 'users.masiveadd.update',
        'destroy' => 'users.masiveadd.destroy',
    ]);

    // Ruta adicional para la importación de usuarios
    Route::post('gestion-usuarios-masiva/import', [MasiveAddController::class, 'import'])->name('users.masiveadd.import');

    // Ruta adicional para la exportación de la plantilla de usuarios
    Route::get('/exportar-usuarios', [MasiveAddController::class, 'exportCsv'])->name('users.exportCsv');
    Route::get('/exportar-estudiantes-plantilla', [MasiveAddController::class, 'exportTemplate'])->name('users.exportTemplate');
    Route::get('/exportar-usuarios-plantilla', [MasiveAddController::class, 'exportTemplateUsers'])->name('users.exportTemplateUsers');
    Route::post('/importar-usuarios', [MasiveAddController::class, 'store'])->name('users.store');

    //Inicia Modulo de Divisiones, Empresas y Carreras conjuntas en proyectos por division.

    //-----

    // Se acaba Modulo de Divisiones, Empresas y Carreras conjuntas en proyectos por division.


    Route::resource('/sanciones', ManagementUserController::class);
    Route::get('/enviar-notification', function () {
        return view('books-notifications.books.test-notifications');
    });
    Route::post('/not', [BooksController::class, 'notifications'])->name('sendNotification');
    Route::get('/scraping', [BooksController::class, 'imageBooks']);
    Route::get('/Configurar_Cuenta', [ManagementConfiguration::class, 'index'])->name('users.configuration');
    Route::put('/configurar_cuenta/{id}', [ManagementConfiguration::class, 'update'])->name('configurar_cuenta.update');
    Route::delete('/configurar-cuenta/{id}/eliminar-foto', [ManagementConfiguration::class, 'destroyProfilePhoto'])->name('configurar_cuenta.remove_photo');


    Route::get('/perfil', [ProfileController::class, 'index']);
    Route::post('/perfil/actualizar-foto', [ProfileController::class, 'actualizarFoto'])->name('actualizar_foto');
    Route::get('/estudiante/{userId}', [StudentController::class, 'showProfile'])->name('profile.student');
    Route::get('/asesor/{id}', [StudentController::class, 'showAdviserProfile'])->name('profile.adviser');



    Route::get('/registrar-usuario', [RegisterUserController::class, 'index']);


    Route::get('libros/slug/{slug}', [BooksController::class, 'show'])->name('libros.show');
    Route::resource('libros', BooksController::class);

    Route::get('/añadir.libros', function () {
        return view('books-notifications.books.add-books');
    })->name('añadir.libros');

    Route::get('/admin/notificaciones', function () {
        return view('books-notifications.notifications');
    });
    Route::get('/notificaciones', function () {
        return view('books-notifications.notificaciones-user');
    });

    Route::get('/usuarios', [CrudUserController::class, 'dashboardUsers'])->name('Dashboard-Usuarios');

    Route::get('/equipos', function () {
        return view('administrator.dashboard.dashboardTeam');
    });

    Route::get('/reporte', [BooksController::class, 'listBook'])->name('books.list');
    Route::get('/reporte/pdf', [BooksController::class, 'report'])->name('books.reports');
    /*     Route::get('/books/export', 'BooksController@export')->name('books.export');
     */
    Route::get('/books/export', [BooksController::class, 'export'])->name('books.export');
    Route::post('/studentsForDivision', [BooksController::class, 'studentsForDivision'])->name('studentsForDivision');



    /*Modulo de proyectos*/
    Route::get('projectdashboard', [ProjectController::class, 'index'])->name('dashboardProjects');
    Route::get('/proyectos', [ProjectController::class, 'list'])->name('Proyectos');
    Route::get('/dashproyectos', [ProjectController::class, 'dashgeneral'])->name('Dashboard-Proyectos');
    Route::get('/anteproyectos', [ProjectController::class, 'dashAnteprojects'])->name('Dashboard-Anteproyectos');
    Route::get('proyectoinvitacion', [ProjectController::class, 'invitation'])->name('projectinvitation');
    Route::get('formanteproyecto', [ProjectController::class, 'projectform'])->name('projectform');
    Route::post('formanteproyecto', [ProjectController::class, 'store'])->name('envproyecto');
    Route::resource('projects', ProjectController::class);
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::delete('/comentarios/{comment}', [ComentarioController::class, 'destroy'])->name('comentario.destroy');
    Route::get('vistanteproyectos', [ProjectController::class, 'viewanteproject'])->name('viewanteproject');
    Route::get('vistaproyectos', [ProjectController::class, 'viewproject'])->name('viewproject');
    Route::get('proyectoequipos', [ProjectController::class, 'projectteams'])->name('projectteams');
    Route::post('/proyecto/{project}/comentario', [ComentarioController::class, 'store'])->name('comentario.store');
    Route::post('/project/{project}/like', [ProjectLikeController::class, 'store'])->name('project.like');
    Route::post('/project/{projectId}/rate', [ProjectController::class, 'rateProject'])->name('rateProject');
    Route::get('/anteproyecto', [ProjectController::class, 'showMyProject'])->name('viewMyProject');
});




//PRUEBA DE PROTECCIÖN DE RUTAS, NO TOCAR
// Rutas protegidas por el rol Adviser
/* Route::middleware(['auth', 'role:Adviser|ManagmentAdmin|SuperAdmin|Secretary'])->group(function () {
 */    // Ruta de prueba para mostrar los proyectos por división
Route::get('/division/proyecto', [DivisionController::class, 'getProjectsPerDivision']);

// Rutas protegidas por el rol Teacher usando resource()
Route::resource('/empresas', CompaniesController::class);
Route::resource('/divisiones', DivisionController::class);
Route::resource('/carreras', ProgramController::class);
/* });
 */
Route::middleware(['auth', 'role:Asesor Académico'])->group(function () {
    Route::post('/asesorias', [AdvisorySessionController::class, 'store'])->name('asesorias.store');
    Route::get('/asesorias/{id}', [AdvisorySessionController::class, 'index'])->name('asesorias');
    Route::get('/asesorias/{id}/todas', [AdvisorySessionController::class, 'all'])->name('asesoriasTodas');
    Route::put('/asesorias/{id}', [AdvisorySessionController::class, 'update'])->name('asesorias.update');
    Route::delete('/asesorias/{id}', [AdvisorySessionController::class, 'destroy'])->name('asesorias.destroy');

    //asesorados
    Route::get('/asesorados/{id}', [AdvisoryReportsController::class, 'index'])->name('asesorados');
    Route::get('/asesorados/{id}/reporte/{alumno}', [AdvisoryReportsController::class, 'show'])->name('reporte');
    Route::post('/asesorados/{id}/reporte/{alumno}/generar', [AdvisoryReportsController::class, 'store'])->name('generarReporte');
    Route::put('/asesorados/sancionar/{id}', [AdvisoryReportsController::class, 'update'])->name('sancionar');
    Route::get('/reporte/{correo}/exportar/{matricula}', [AdvisoryReportsController::class, 'exportToExcel'])->name('exportarReporte');
});

Route::middleware(['auth', 'role:Estudiante'])->group(function () {
    Route::get('/asesorias/estudiante/{id}', [AdvisorySessionController::class, 'student'])->name('asesoriasStudent');
    Route::post('/asesorias/solicitar/{id}', [AdvisorySessionController::class, 'enviar'])->name('asesoriasEnviar');
});

Route::middleware(['auth', 'role:Administrador de División|Asesor Académico'])->group(function () {
    Route::get('/empresas-afiliadas', [CompaniesController::class, 'showTable'])->name('empresas.showTable');

});

Route::get('/estudiante', [StudentController::class, 'index'])->name('home');
Route::get('/asesor', [AcademicAdvisorController::class, 'index'])->name('home.advisor');

Route::middleware(['auth', 'role:Administrador de División'])->group(function () {
    Route::get('/estudiantes-dash', [StudentDashController::class, 'studentsForDivision'])->name('student-dash');

});

// Asegúrate de que el usuario esté autenticado y tenga el rol adecuado
Route::middleware(['auth', 'role:Administrador de División'])->group(function () {
    Route::get('/division-projects', [projectsDivisionController::class, 'projectsForDivision'])->name('division-projects');
});

//Middlewares por rol, pongan sus vistas según como lógicamente deba verlas cierto rol

// Route::middleware(['auth', 'role:Student|ManagmentAdmin|SuperAdmin'])->group(function () {
//     Route::get('/', [Controller::class, 'get']);

//     Route::resource('/', Controller::class);
//     Route::resource('/', Controller::class);
//     Route::resource('/', Controller::class);
// });

// Route::middleware(['auth', 'role:President|ManagmentAdmin|SuperAdmin'])->group(function () {
//     Route::get('/', [Controller::class, 'get']);

//     Route::resource('/', Controller::class);
//     Route::resource('/', Controller::class);
//     Route::resource('/', Controller::class);
// });

// Route::middleware(['auth', 'role:Secretary|ManagmentAdmin|SuperAdmin'])->group(function () {
//     Route::get('/', [Controller::class, 'get']);

//     Route::resource('/', Controller::class);
//     Route::resource('/', Controller::class);
//     Route::resource('/', Controller::class);
// });
