<?php

namespace App\Models;

use App\Models\management\Affiliated_companie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname_student',
        'id_student',
        'group_student',
        'phone_student',
        'email_student',
        'startproject_date',
        'endproject_date',
        'name_project',
        'company_name',
        'company_address',
        'advisor_business_name',
        'advisor_business_position',
        'advisor_business_phone',
        'advisor_business_email',
        'project_area',
        'general_objective',
        'problem_statement',
        'justification',
        'activities',
        'id_academic_advisor_id',
        'id_business_advisor_id',
        'id_program_id',
        'id_company_id',
        'status',
    ];

    protected $casts = [
        'startproject_date' => 'date',
        'endproject_date' => 'date',
    ];

    

    

    public function academicAdvisor()
    {
    return $this->belongsTo(AcademicAdvisor::class, 'id_academic_advisor_id');
    }

    public function businessAdvisor()
    {
    return $this->belongsTo(BusinessAdvisor::class, 'id_business_advisor_id');
    }

    public function company()
    {
    return $this->belongsTo(Affiliated_companie::class, 'id_company_id');
    }


    // Interactua con el atributo directo para transformarlo en minusculas
    protected function name(): Attribute
    {
        return new Attribute(
            //Transforma las primeras letras en mayuscula
            //ACCESOR: Transforman caundo hacemos una consulta. No modifican el valor, solo la representación del registro.
            get: fn($value) => ucwords($value),

            //Captura el dato y lo transforma en minusculas.
            //MUTADORES: Transforman el valor antes de almacenarlo
            set: fn($value) => strtolower($value)

        );
    }
}

/*
Una clase llamada Projects que se extiende de la clase llamada model.
Vamos a poder acceder al método create, update, delete, entre otros.
Esto nos permite manejar nuestros registros como formularios.
Con ORM pdoemos tratar cualquier registro como un objeto.

Define la estructura y relaciones de la tabla.

Para la representación de un registro para que venga transformado tenemos que usar Accesor
*/
