<?php
//importaciones de controladores
use App\Http\Controllers\GroupController;
use Spatie\Permission\Middlewares;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprovementLetter;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\auth\PostController;
use App\Http\Controllers\MasiveAddController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\auth\LoginControlller;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\books\BooksController;
use App\Http\Controllers\ProjectLikeController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\Career\ProgramController;
use App\Http\Controllers\AcademicAdvisorController;
use App\Http\Controllers\AdvisoryReportsController;
use App\Http\Controllers\AdvisorySessionController;
use App\Http\Controllers\profile\ProfileController;
use App\Http\Controllers\projects\ProjectController;
use App\Http\Controllers\divisions\DivisionController;
use App\Http\Controllers\users\RegisterUserController;
use App\Http\Controllers\auth\ForgotPasswordController;
use App\Http\Controllers\Companies\CompaniesController;
use App\Http\Controllers\users\ManagementConfiguration;
use App\Http\Controllers\projects\ProjectFormController;
use App\Http\Controllers\projects\ViewProjectController;
use App\Http\Controllers\users\ManagementUserController;
use App\Http\Controllers\advisorDash\AdvisorDashController;
use App\Http\Controllers\AprobacionController;
use App\Http\Controllers\CartaDigitalizacionController;
use App\Http\Controllers\CedulaController;
use App\Http\Controllers\studentDash\StudentDashController;
use App\Http\Controllers\studentDash\projectsDivisionController;
use App\Http\Controllers\studentDash\anteprojectsDivisionController;
use App\Http\Controllers\InvitacionEstudianteController;

//Cosas necesarias para el login
Route::middleware(['guest'])->group(function () {
    Route::get('/Iniciar-sesion', [LoginControlller::class, 'index'])->name('login');
    Route::post('/Iniciar-sesion', [LoginControlller::class, 'store']);
    Route::get('/recuperar-contraseña', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/recuperar-contraseña', [ForgotPasswordController::class, 'sendPassword'])->name('password.email');
});

//Comprueba que el usuario este loggeado
Route::middleware(['auth'])->group(function () {
    //Redirije a la ruta segun su rol
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
    //Cierra la sesion
    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
    //Notificaciones para los usuarios en general
    Route::get('/notificaciones', function () {
        return view('books-notifications.notificaciones-user');
    });
    // Perfil del usuario general
    Route::get('/Configurar_Cuenta', [ManagementConfiguration::class, 'index'])->name('users.configuration');
    Route::put('/configurar_cuenta/{id}', [ManagementConfiguration::class, 'update'])->name('configurar_cuenta.update');
    Route::delete('/configurar-cuenta/{id}/eliminar-foto', [ManagementConfiguration::class, 'destroyProfilePhoto'])->name('configurar_cuenta.remove_photo');
    Route::get('/perfil', [ProfileController::class, 'index']);
    Route::post('/perfil/actualizar-foto', [ProfileController::class, 'actualizarFoto'])->name('actualizar_foto');
    //Acciones que puede hacer una secretaria
    Route::middleware(['auth', 'role:Asistente de Dirección'])->group(function () {
        Route::get('libros/slug/{slug}', [BooksController::class, 'show'])->name('libros.show');
        Route::resource('libros', BooksController::class);
        Route::get('/admin/notificaciones', function () {
            return view('books-notifications.notifications');
        });
        Route::post('/not', [BooksController::class, 'notifications'])->name('sendNotification');
        Route::get('/scraping', [BooksController::class, 'imageBooks']);
        Route::get('/reporte', [BooksController::class, 'listBook'])->name('books.list');
        Route::get('/reporte/pdf', [BooksController::class, 'report'])->name('books.reports');
        Route::get('/books/export', [BooksController::class, 'export'])->name('books.export');
        Route::post('/studentsForDivision', [BooksController::class, 'studentsForDivision'])->name('studentsForDivision');
    });
    //Acciones que puede hacer un Asesor academico
    Route::middleware(['auth', 'role:Asesor Académico'])->group(function () {
        //inicio
        Route::get('/asesor', [AcademicAdvisorController::class, 'index'])->name('home.advisor');
        //Sesiones de asesoria
        Route::post('/asesorias', [AdvisorySessionController::class, 'store'])->name('asesorias.store');
        Route::get('/asesorias/{id}', [AdvisorySessionController::class, 'index'])->name('asesorias');
        Route::get('/asesorias/{id}/todas', [AdvisorySessionController::class, 'all'])->name('asesoriasTodas');
        Route::put('/asesorias/{id}', [AdvisorySessionController::class, 'update'])->name('asesorias.update');
        Route::delete('/asesorias/{id}', [AdvisorySessionController::class, 'destroy'])->name('asesorias.destroy');
        // asesorados
        Route::get('/estudiante/{userId}', [StudentController::class, 'showProfile'])->name('profile.student');
        Route::get('/asesorados/{id}', [AdvisoryReportsController::class, 'index'])->name('asesorados');
        Route::get('/asesorados/{id}/reporte/{alumno}', [AdvisoryReportsController::class, 'show'])->name('reporte');
        Route::post('/asesorados/{id}/reporte/{alumno}/generar', [AdvisoryReportsController::class, 'store'])->name('generarReporte');
        Route::put('/asesorados/sancionar/{id}', [AdvisoryReportsController::class, 'update'])->name('sancionar');
        Route::get('/reporte/{correo}/exportar/{matricula}', [AdvisoryReportsController::class, 'exportToExcel'])->name('exportarReporte');
        //Proyectos
        Route::delete('/comentarios/{comment}', [ComentarioController::class, 'destroy'])->name('comentario.destroy');
        Route::post('/proyecto/{project}/comentario', [ComentarioController::class, 'store'])->name('comentario.store');
        Route::post('/project/{project}/like', [ProjectLikeController::class, 'store'])->name('project.like');
        Route::post('/project/{projectId}/rate', [ProjectController::class, 'rateProject'])->name('rateProject');
        Route::put('/projects/{project}/update-status', [ProjectController::class, 'updateStatus'])->name('project.updateStatus');
    });
    //Acciones que puede hacer un estudante
    Route::middleware(['auth', 'role:Estudiante'])->group(function () {
        //inicio
        Route::get('/estudiante', [StudentController::class, 'index'])->name('home');
        //sesiones de asesoria
        Route::get('/asesor/{id}', [StudentController::class, 'showAdviserProfile'])->name('profile.adviser');
        Route::get('/asesorias/estudiante/{id}', [AdvisorySessionController::class, 'student'])->name('asesoriasStudent');
        Route::post('/asesorias/solicitar/{id}', [AdvisorySessionController::class, 'enviar'])->name('asesoriasEnviar');
        //reportes
        Route::get('/generar-cedula', [CedulaController::class, 'cedula'])->name('cedula.anteproyecto');
        Route::get('/exportar', [StudentController::class, 'export'])->name('student.export');
        Route::get('generar-carta-digitalizacion', [CartaDigitalizacionController::class, 'digitalizacion'])->name('carta-digitalizacion');
        //libros
        Route::get('/libro', [BooksController::class, 'studentBook'])->name('libro-student');
        Route::get('/añadir.libros', function () {
            return view('books-notifications.books.Add-books');
        })->name('añadir.libros');
        //proyectos
        Route::get('/proyectoinvitacion', [ProjectController::class, 'invitation'])->name('projectinvitation');
        Route::get('/formanteproyecto', [ProjectController::class, 'projectform'])->name('projectform');
        Route::post('/formanteproyecto', [ProjectController::class, 'store'])->name('envproyecto');
        Route::post('/invitar/estudiante', [InvitacionEstudianteController::class, 'enviarInvitacion'])->name('invitar.estudiante');
        Route::get('/anteproyecto', [ProjectController::class, 'showMyProject'])->name('viewMyProject');
        Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
        Route::get('carta-aprobacion', [AprobacionController::class, 'aprobar'])->name('aprobacion');
        Route::put('/projects/{id}/updateIsPublic', [ProjectController::class, 'updateIsPublic'])->name('projects.updateIsPublic');
        Route::put('editar-anteproyecto', [ProjectController:: class, 'edit'])->name('editanteproyecto');
    });
    //Vusualizacion de elementos para quienes no sean estudiantes o secretarias
    Route::middleware(['auth', 'role:Administrador de División|Asesor Académico|Super Administrador'])->group(function () {
        Route::resource('/empresas', CompaniesController::class);
        Route::resource('/divisiones', DivisionController::class);
        Route::post('/divisiones/{id}/activate', [DivisionController::class, 'activate'])->name('divisiones.activate');
        Route::resource('/carreras', ProgramController::class);
        Route::resource('/grupos', GroupController::class);
        Route::put('/empresas/{id}/activate', [CompaniesController::class, 'activate'])->name('empresas.activate');
        Route::get('/proyectoequipos', [ProjectController::class, 'projectteams'])->name('projectteams');
        Route::get('/vistanteproyectos', [ProjectController::class, 'viewanteproject'])->name('viewanteproject');
        Route::get('/vistaproyectos', [ProjectController::class, 'viewproject'])->name('viewproject');
        Route::get('/carreras/division', [ProgramController::class, 'divisionCarreras'])->name('division.carreras');
        Route::get('/empresas-afiliadas', [CompaniesController::class, 'showTable'])->name('empresas.showTable');
    });
    //Permisos unicamente para el director de division
    Route::get('/estudiantes-dash', [StudentDashController::class, 'studentsForDivision'])->middleware("can:studentsForDivision")->name('student-dash');
    Route::get('/asesores-dash', [AdvisorDashController::class, 'advisorsForDivision'])->middleware("can:advisorsForDivision")->name('academic-advisor');
    Route::get('/division-projects', [projectsDivisionController::class, 'projectsForDivision'])->middleware("can:projectsForDivision")->name('Division-Proyectos');
    Route::get('/division-anteprojects', [anteprojectsDivisionController::class, 'anteprojectsForDivision'])->middleware("can:anteprojectsForDivision")->name('Division-Anteproyectos');
    //Permisos unicamente para el administrador
    // Gestion de roles y permisos
    Route::resource('roles-permisos', RolesController::class)->names('roles.permissions');
    //Gestion de usuarios
    Route::resource('gestion-usuarios', CrudUserController::class)->names([
        'index' => 'users.cruduser.index',
        'create' => 'users.cruduser.create',
        'store' => 'users.cruduser.store',
        'show' => 'users.cruduser.show',
        'edit' => 'users.cruduser.edit',
        'update' => 'users.cruduser.update',
        'destroy' => 'users.cruduser.destroy',
    ]);
    Route::get('/usuarios', [CrudUserController::class, 'dashboardUsers'])->name('Dashboard-Usuarios');
    // Actualización de usuarios
    Route::put('gestion-usuarios/{user}', [CrudUserController::class, 'update'])->name('users.cruduser.update');
    // Gestion de usuarios masiva
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
    // Proyectos
    Route::resource('/projects', ProjectController::class);
    Route::get('/projectdashboard', [ProjectController::class, 'index'])->name('dashboardProjects');
    Route::get('/anteproyectos', [ProjectController::class, 'dashAnteprojects'])->name('Dashboard-Anteproyectos');
    Route::get('/dashproyectos', [ProjectController::class, 'dashgeneral'])->name('Dashboard-Proyectos');
    Route::get('vistanteproyectosadmin', [ProjectController::class, 'viewanteprojectAdmin'])->name('viewanteprojectAdmin');
    Route::get('/projectsdash', function () {
        return view('management.project');
    });
});
