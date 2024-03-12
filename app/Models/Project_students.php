<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Project_students extends Model
{
    use HasFactory;
    // Mencionar la tabla que esta administrando
    protected $fillable = [
        'project_id',
        'student_id',
        'is_main_student'
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
