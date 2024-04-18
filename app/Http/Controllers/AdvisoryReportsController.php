<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Activities;
use App\Mail\PetitionDateMail;
use App\Mail\SanctionAdvisor;
use Illuminate\Support\Facades\Mail;
use App\Notifications\PetitionDateNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Report;
use App\Models\AdvisorySession;
use App\Exports\EstadiaControlsExport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\TemplateProcessor;
use Carbon\Carbon;

class AdvisoryReportsController extends Controller
{
    public function index($slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();
        if (!$user->hasRole('Asesor Académico')) {
            abort(404);
        }

        $academicAdvisor = $user->academicAdvisor;

        $students = $academicAdvisor->students()
                        ->with(['user', 'projects', 'group'])
                        ->whereHas('user', function ($query) {
                            $query->where('isActive', true);
                        })
                        ->get();

        return view('consultancy.advisor.Students', compact('students', 'slug'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id, $alumno)
    {
        $validatedData = $request->validate([
            'matricula' => 'required|string|max:50',
            'nombre' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s\-]+$/'],
            'evaluacion_asesor_empresarial' => 'nullable|numeric|min:0|max:100',
            'evaluacion_asesor_academico' => 'nullable|numeric|min:0|max:100',
            'nombre_asesor' => ['nullable', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s\-]+$/'],
            'correo_asesor' => 'nullable|email|max:255',
            'titulo_memoria' => ['nullable', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\s\-]+$/'],
            'observaciones' => ['nullable', 'string', 'regex:/^[a-zA-Z0-9\s\-]+$/'],
        ]);
        $asesor = User::where('slug', $id)->firstOrFail();
        if (!$asesor->hasRole('Asesor Académico')) {
            abort(404);
        }
        $estudiante = User::where('slug', $alumno)->firstOrFail();
        if (!$estudiante->hasRole('Estudiante')) {
            abort(404);
        }
        $asesorEstudiante = $estudiante->student->academic_advisor_id;
        if (!($asesorEstudiante==$asesor->academicAdvisor->id)) {
            abort(404);
        }
        $asesorAcademico = $asesor->academicAdvisor;
        $matricula = $estudiante->student->registration_number;

        $reporte = Report::where('matricula', $matricula)->first();
        $actividades_realizadas = [];

        $index = 0;
        while ($request->has('actividadRealizada' . $index)) {
            $realizada = $request->input('actividadRealizada' . $index);
            $motivo = $request->input('motivo' . $index);
            $fecha = $request->input('fecha' . $index);
            $fecha2 = $request->input('fecha2' . $index);
            $actividades_realizadas[] = [
                'motivo' => $motivo,
                'realizada' => $realizada == 'on' ? true : false,
                'fecha' => $fecha,
                'fecha2' => $fecha2
            ];

            $index++;
        }
        $reporte->update([
            'matricula' => $validatedData['matricula'],
            'nombre' => $validatedData['nombre'],
            'tradicional' => $request->tipoMemoria == 'tradicional' ? 1 : 0,
            'excelencia' => $request->tipoMemoria =='excelencia' ? 1 : 0,
            'proyecto_investigacion' => $request->tipoMemoria =='proyectoInvestigacion' ? 1 : 0,
            'experiencia_profesional' => $request->tipoMemoria =='experienciaProfesional' ? 1 : 0,
            'certificacion_profesional' => $request->tipoMemoria =='certificacionProfesional' ? 1 : 0,
            'movilidad_internacional' => $request->tipoMemoria =='movilidadInternacional' ? 1 : 0,
            'contacto_inicial' => $request->contacto_inicial ? 1 : 0,
            'contacto_seguimiento' => $request->contacto_seguimiento ? 1 : 0,
            'contacto_cierre' => $request->contacto_cierre ? 1 : 0,
            'actividad_realizada' => json_encode($actividades_realizadas),
            'evaluacion_asesor_empresarial' => $validatedData['evaluacion_asesor_empresarial'],
            'evaluacion_asesor_academico' => $validatedData['evaluacion_asesor_academico'],
            'amonestacion_academica1' => $estudiante->student->sanction_advisor > 0 ? true : false,
            'amonestacion_academica2' => $estudiante->student->sanction_advisor > 1 ? true : false,
            'amonestacion_academica3' => $estudiante->student->sanction_advisor > 2 ? true : false,
            'gestion_empresarial1' => $estudiante->student->sanction_company > 0 ? true : false,
            'gestion_empresarial2' => $estudiante->student->sanction_company > 1 ? true : false,
            'gestion_empresarial3' => $estudiante->student->sanction_company > 2 ? true : false,
            'nombre_asesor' => $validatedData['nombre_asesor'],
            'correo_asesor' => $validatedData['correo_asesor'],
            'titulo_memoria' => $validatedData['titulo_memoria'],
            'observaciones' => $validatedData['observaciones'],
        ]);

        return redirect()->route('asesorados', ['id' => $id])->with('success', 'Datos almacenados correctamente.');
    }

    public function show($id, $alumno){
        $asesor = User::where('slug', $id)->firstOrFail();
        if (!$asesor->hasRole('Asesor Académico')) {
            abort(404);
        }
        $estudiante = User::where('slug', $alumno)->firstOrFail();
        if (!$estudiante->hasRole('Estudiante')) {
            abort(404);
        }
        $asesorEstudiante = $estudiante->student->academic_advisor_id;
        if (!($asesorEstudiante==$asesor->academicAdvisor->id)) {
            abort(404);
        }
        $asesorAcademico = $asesor->academicAdvisor;
        $matricula = $estudiante->student->registration_number;

        $reporte = Report::where('matricula', $matricula)->first();
        $student = $estudiante->student;
        $activeStudents = $asesorAcademico->students()->whereHas('user', function ($query) use ($alumno) {
            $query->where('users.slug', $alumno);
        })->get();
        $projectIds = $activeStudents->flatMap(function ($student) {
            return $student->projects->pluck('id');
        })->unique();
        $sessions = auth()->user()->academicAdvisor->activities;;

            $actividades_realizadas = [];

            $actividades_reporte = [];
            if ($reporte) {
                $actividades_reporte = json_decode($reporte->actividad_realizada, true);
            }$actividades_realizadas = [];

            $actividades_reporte = [];
            if ($reporte) {
                $actividades_reporte = json_decode($reporte->actividad_realizada, true);
            }

            foreach ($sessions as $session) {
                $Date = Carbon::parse($session->date);
                $fecha0 = $Date->format('d-m-Y');
                $actividad = [
                    'motivo' => $session->name,
                    'realizada' => false,
                    'fecha' => $session->id,
                    'fecha2' => $fecha0
                ];

                $existe = false;
                foreach ($actividades_reporte as &$act_reporte) {
                    if ($act_reporte['fecha'] == $actividad['fecha']) {
                        $existe = true;
                        if ($act_reporte['motivo'] !== $actividad['motivo']) {
                            $act_reporte['motivo'] = $actividad['motivo'];
                        }
                        break;
                    }
                }
                if (!$existe) {
                    $actividades_realizadas[] = $actividad;
                }
            }
            $actividades_final = array_merge($actividades_realizadas, $actividades_reporte);
            foreach ($actividades_final as $key => $actividad) {
                $fecha_actividad = $actividad['fecha'];
                $fecha_encontrada = false;
                foreach ($sessions as $session) {
                    if ($fecha_actividad == $session->id) {
                        $fecha_encontrada = true;
                        break;
                    }
                }
                if (!$fecha_encontrada) {
                    unset($actividades_final[$key]);
                }
            }
            $actividades_final = array_values($actividades_final);

        if (!$reporte) {
            $reporte = Report::create([
                'matricula' => $matricula,
                'nombre' => $estudiante->name,
                'tradicional' => false,
                'excelencia' => false,
                'proyecto_investigacion' => false,
                'experiencia_profesional' => false,
                'certificacion_profesional' => false,
                'movilidad_internacional' => false,
                'contacto_inicial' => '',
                'contacto_seguimiento' => '',
                'contacto_cierre' => '',
                'evaluacion_asesor_empresarial' => null,
                'evaluacion_asesor_academico' => null,
                'actividad_realizada' => json_encode($actividades_final),
                'amonestacion_academica1' => $estudiante->student->sanction_advisor > 0 ? true : false,
                'amonestacion_academica2' => $estudiante->student->sanction_advisor > 1 ? true : false,
                'amonestacion_academica3' => $estudiante->student->sanction_advisor > 2 ? true : false,
                'gestion_empresarial1' => $estudiante->student->sanction_company > 0 ? true : false,
                'gestion_empresarial2' => $estudiante->student->sanction_company > 1 ? true : false,
                'gestion_empresarial3' => $estudiante->student->sanction_company > 2 ? true : false,
                'nombre_asesor' => $asesor->name,
                'correo_asesor' => $asesor->email,
                'titulo_memoria' => $estudiante->student->projects[0]->name_project,
                'observaciones' => ''
            ]);
        }else {
            $reporte->update([
                'actividad_realizada' => json_encode($actividades_final),
            ]);
        }

        return view('consultancy.advisor.AdvisoryReport', compact('alumno','id', 'reporte'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'message' => 'required|max:255'
        ]);
        $user = Student::where('id', $id)->firstOrFail();
        if (!$user->user->hasRole('Estudiante')) {
            abort(404);
        }
        $fechaActual = Carbon::now();
        $diaNumero = $fechaActual->day;
        $mes = $fechaActual->monthName;
        $año = $fechaActual->year;
        $template = public_path('word/sanciones.docx');
        $templateProcessor = new TemplateProcessor($template);
        $variables = [
            'dia' => $diaNumero,
            'mes' => $mes,
            'año' => $año,
            'nombre' => $user->user->name,
            'matricula' => $user->registration_number,
            'programa' => $user->group->program->name,
            'aca1' => $request->tipo =='asesor' ? $user->sanction_advisor == 0 ? 'X' : ' ' : ' ',
            'aca2' => $request->tipo =='asesor' ? $user->sanction_advisor == 1 ? 'X' : ' ' : ' ',
            'aca3' => $request->tipo =='asesor' ? $user->sanction_advisor == 2 ? 'X' : ' ' : ' ',
            'emp1' => $request->tipo =='empresarial' ? $user->sanction_company == 0 ? 'X' : ' ' : ' ',
            'emp2' => $request->tipo =='empresarial' ? $user->sanction_company == 1 ? 'X' : ' ' : ' ',
            'emp3' => $request->tipo =='empresarial' ? $user->sanction_company == 2 ? 'X' : ' ' : ' ',
            'acah' => $request->tipo =='asesor' ? $request->horas : '___',
            'emph' => $request->tipo =='empresarial' ? $request->horas : '___',
            'sancion' => $user->sanction_advisor + $user->sanction_company,
        ];
        foreach ($variables as $key => $value) {
            $templateProcessor->setValue($key, $value);
        }
        $outputFile = 'Sancion_por_incumplimiento.docx';
        $templateProcessor->saveAs($outputFile);

        if ($request->tipo =='asesor') {
            $cantidad = $user->sanction_advisor + 1;
            $user->update(['sanction_advisor' => $cantidad]);
        }elseif ($request->tipo =='empresarial') {
            $cantidad = $user->sanction_company + 1;
            $user->update(['sanction_company' => $cantidad]);
        }

        Notification::send($user->user,new PetitionDateNotification($user->user, $request));
        try {
            Mail::to($user->user->email)->send(new PetitionDateMail($user->user, $request, $outputFile));
            Mail::to($user->academicAdvisor->user->email)->send(new SanctionAdvisor($user->academicAdvisor->user, $request, $outputFile));
        } catch (\Throwable $th) {

        }

        unlink($outputFile);
        return back()->with('delete', 'Se ha sancionado al alumno exitosamente.');
    }

    public function exportToExcel($correo)
    {
        $user = User::where('email', $correo)->first();
        if (!$user) {
            return response()->json(['message' => 'Correo electrónico no encontrado'], 404);
        }
        $report = Report::where('correo_asesor', $correo)->get();
        if ($report->isEmpty()) {
            return response()->json(['message' => 'No hay reportes para el correo electrónico proporcionado'], 404);
        }
        return Excel::download(new EstadiaControlsExport($report), 'control-de-estadia.xlsx');
    }

    public function destroy(string $id)
    {

    }

    public function activities()
    {
        $activities = auth()->user()->academicAdvisor->activities;
        return view('consultancy.advisor.Activities', compact('activities'));
    }
    public function addActivitie(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'name' => 'required|max:255',
            'id_advisor_id' => 'required'
        ]);
        $session = Activities::create($validatedData);
        return back()->with('succes', 'Se ha creado la actividad correctamente.');
    }
    public function editActivitie(Request $request, $id)
    {
        $validatedData = $request->validate([
            'date' => 'required',
            'name' => 'required|max:255',
            'id_advisor_id' => 'required'
        ]);
        $actividad = Activities::find($id);
        if (!$actividad) {
            return response()->json(['message' => 'Session not found'], 404);
        }
        $actividad->update($validatedData);
        return back()->with('edit', 'Se ha modificado la actividad correctamente.');
    }
    public function deleteActivitie($id)
    {
        $actividad = Activities::find($id);
        if (!$actividad) {
            return response()->json(['message' => 'Session not found'], 404);
        }
        $actividad->delete();
        return back()->with('delete', 'Se ha eliminado la actividad correctamente.');
    }
}
