<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Casts\Attribute;

class Projects extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'status',
        'general_information',
        'general_objective',
        'problem_statement',
        'justification',
        'activities',
        'program_id',
        'company_id',
        'start_date',
        'end_date',
        'approved',
        'academic_advisor_id',
        'business_advisor_id'
    ];

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
