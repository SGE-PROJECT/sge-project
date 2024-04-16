<?php

namespace App\Models;

use App\Models\management\Program;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];



    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function academicDirectors()
    {
        return $this->hasMany(AcademicDirector::class);
    }


}
