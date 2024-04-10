<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';

    protected $fillable = [
        'matricula',
        'nombre',
        'tradicional',
        'excelencia',
        'proyecto_investigacion',
        'experiencia_profesional',
        'certificacion_profesional',
        'movilidad_internacional',
        'contacto_inicial',
        'contacto_seguimiento',
        'contacto_cierre',
        'evaluacion_asesor_empresarial',
        'evaluacion_asesor_academico',
        'actividad_realizada',
        'amonestacion_academica1',
        'amonestacion_academica2',
        'gestion_empresarial1',
        'gestion_empresarial2',
        'nombre_asesor',
        'correo_asesor',
        'titulo_memoria',
        'observaciones'
    ];
}
