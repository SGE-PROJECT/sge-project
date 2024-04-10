@extends('layouts.panelUsers')

@section('titulo', 'Reporte de estadias')

@section('css')
    <style>
        input, textarea {
            outline: none;
        }
    </style>
@endsection

@section('contenido')
    @if ($id !== auth()->user()->slug)
        {{ abort(404) }}
    @endif
    <main class="py-[20px]">

        <div class="min-h-screen flex items-center justify-center">
            <div class="bg-white shadow-lg rounded-lg max-w-4xl w-full p-8">
                <h1 class="text-2xl font-semibold text-center mb-8">Control de Estadía</h1>
                <form action="{{ route('generarReporte', ['id' => auth()->user()->slug, 'alumno' => $alumno]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="matricula" class="block text-sm font-medium text-gray-700">Matrícula:</label>
                            <input type="text" id="matricula" name="matricula" placeholder="Ingrese matrícula" required
                                value="{{ $reporte->matricula }}" readonly
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border-2 px-1 py-1">
                        </div>

                        <div>
                            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del alumno:</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre del alumno"
                                required value="{{ $reporte->nombre }}" readonly
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm  border-2 px-1 py-1">
                        </div>
                    </div>

                    <fieldset class="mt-6">
                        <legend class="text-sm font-medium text-gray-700">Tipo de memoria:</legend>
                        <div class="mt-2 space-y-2">
                            <div>
                                <label for="tradicional" class="inline-flex items-center">
                                    <input type="radio" id="tradicional" name="tipoMemoria" value="tradicional" {{ $reporte->tradicional ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                                    <span class="ml-2 text-sm text-gray-700">Tradicional</span>
                                </label>
                            </div>

                            <div>
                                <label for="excelencia" class="inline-flex items-center">
                                    <input type="radio" id="excelencia" name="tipoMemoria" value="excelencia" {{ $reporte->excelencia ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                                    <span class="ml-2 text-sm text-gray-700">Excelencia</span>
                                </label>
                            </div>

                            <div>
                                <label for="proyectoInvestigacion" class="inline-flex items-center">
                                    <input type="radio" id="proyectoInvestigacion" name="tipoMemoria"
                                        value="proyectoInvestigacion" {{ $reporte->proyecto_investigacion ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                                    <span class="ml-2 text-sm text-gray-700">Proyecto de Investigación</span>
                                </label>
                            </div>

                            <div>
                                <label for="experienciaProfesional" class="inline-flex items-center">
                                    <input type="radio" id="experienciaProfesional" name="tipoMemoria"
                                        value="experienciaProfesional" {{ $reporte->experiencia_profesional ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                                    <span class="ml-2 text-sm text-gray-700">Experiencia Profesional</span>
                                </label>
                            </div>

                            <div>
                                <label for="certificacionProfesional" class="inline-flex items-center">
                                    <input type="radio" id="certificacionProfesional" name="tipoMemoria"
                                        value="certificacionProfesional" {{ $reporte->certificacion_profesional ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                                    <span class="ml-2 text-sm text-gray-700">Certificación Profesional</span>
                                </label>
                            </div>

                            <div>
                                <label for="movilidadInternacional" class="inline-flex items-center">
                                    <input type="radio" id="movilidadInternacional" name="tipoMemoria"
                                        value="movilidadInternacional" {{ $reporte->movilidad_internacional ? 'checked' : '' }}
                                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                                    <span class="ml-2 text-sm text-gray-700">Movilidad Internacional</span>
                                </label>
                            </div>
                        </div>
                    </fieldset>


                    <div class="mt-6">
                        <label for="contactoInicial" class="block text-sm font-medium text-gray-700">Contacto
                            Inicial:</label>
                        <input type="text" id="contactoInicial" name="contacto_inicial"
                            placeholder="Ingrese el contacto inicial" value="{{$reporte->contacto_inicial}}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                    </div>

                    <div class="mt-6">
                        <label for="contactoSeguimiento" class="block text-sm font-medium text-gray-700">Contacto de
                            Seguimiento:</label>
                        <input type="text" id="contactoSeguimiento" name="contacto_seguimiento"
                            placeholder="Ingrese el contacto de seguimiento" value="{{$reporte->contacto_seguimiento}}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                    </div>

                    <div class="mt-6">
                        <label for="contactoCierre" class="block text-sm font-medium text-gray-700">Contacto de
                            Cierre:</label>
                        <input type="text" id="contactoCierre" name="contacto_cierre"
                            placeholder="Ingrese el contacto de cierre" value="{{$reporte->contacto_cierre}}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                    </div>

                    <div class="mt-6">
                        <label for="evaluacionAsesorEmpresarial"
                            class="block text-sm font-medium text-gray-700">Evaluación
                            Asesor Empresarial:</label>
                        <input type="number" id="evaluacionAsesorEmpresarial" name="evaluacion_asesor_empresarial"
                            placeholder="Ingrese la calificación" value="{{$reporte->evaluacion_asesor_empresarial}}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                    </div>

                    <div class="mt-6">
                        <label for="evaluacionAsesorAcademico" class="block text-sm font-medium text-gray-700">Evaluación
                            Asesor Académico:</label>
                        <input type="number" id="evaluacionAsesorAcademico" name="evaluacion_asesor_academico"
                            placeholder="Ingrese la calificación" value="{{$reporte->evaluacion_asesor_academico}}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700">Actividades:</label>
                        <div class="mt-2">
                            @php
                                $actividades = json_decode($reporte->actividad_realizada, true);
                            @endphp
                            @if ($actividades)

                            @foreach ($actividades as $index => $actividad)
                                <div>
                                    <label for="realizada{{ $index }}" class="inline-flex items-center">
                                        <input type="hidden" name="actividadRealizada{{ $index }}" value="false">
                                        <input type="checkbox" id="realizada{{ $index }}"
                                            name="actividadRealizada{{ $index }}"
                                            {{ $actividad['realizada'] ? 'checked' : '' }}
                                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">
                                        <span class="ml-2 text-sm text-gray-700">{{ $actividad['motivo'] }}</span>
                                    </label>
                                    <input type="text" readonly class="hidden" value="{{ $actividad['motivo'] }}"
                                        name="motivo{{ $index }}">
                                    <input type="text" readonly class="hidden" value="{{ $actividad['fecha'] }}"
                                        name="fecha{{ $index }}">
                                </div>
                            @endforeach
                            @else
                            <p class="block text-sm font-medium text-gray-700">Ninguna actividad encontrada</p>
                            @endif


                        </div>
                    </div>

                    <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="nombreAsesor" class="block text-sm font-medium text-gray-700">Nombre
                                Asesor:</label>
                            <input type="text" id="nombreAsesor" name="nombre_asesor"
                                placeholder="Ingrese el nombre del asesor" value="{{ $reporte->nombre_asesor }}" readonly
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border-2 px-1 py-1">
                        </div>

                        <div>
                            <label for="correoAsesor" class="block text-sm font-medium text-gray-700">Correo
                                Asesor:</label>
                            <input type="email" id="correoAsesor" name="correo_asesor"
                                placeholder="Ingrese el correo del asesor" value="{{ $reporte->correo_asesor }}" readonly
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border-2 px-1 py-1">
                        </div>
                    </div>

                    <div class="mt-6">
                        <label for="tituloMemoria" class="block text-sm font-medium text-gray-700">Título de la
                            Memoria:</label>
                        <input type="text" id="tituloMemoria" name="titulo_memoria"
                            placeholder="Ingrese el título de la memoria" value="{{ $reporte->titulo_memoria }}" readonly
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border-2 px-1 py-1">
                    </div>

                    <div class="mt-6">
                        <label for="observaciones" class="block text-sm font-medium text-gray-700">Observaciones:</label>
                        <textarea id="observaciones" name="observaciones" placeholder="Ingrese observaciones"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 border-2 px-1 py-1">{{ $reporte->observaciones }}</textarea>
                    </div>

                    <div class="mt-8 block md:flex justify-center gap-8">
                        <button type="submit" onclick='() => {
                            var formularios = document.querySelectorAll("form");
                            formularios.forEach(function(formulario) {
                                var botones = formulario.querySelectorAll("button");
                                botones.forEach(function(boton) {
                                    boton.disabled = true;
                                });
                            });
                        }'
                            class="font-bold w-full mb-5 bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-700 transition-colors">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
