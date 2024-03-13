<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdvisorySession;
use App\Models\UsersTest;
use App\Models\ProyectStudentTest;

class ProjectsTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'image',
        'general_information',
    ];

    public function advisorySessions()
    {
        return $this->hasMany(AdvisorySession::class);
    }

    public function hasStudents()
    {
        return $this->hasMany(ProyectStudentTest::class, 'id_Proyect_id');
    }
}
