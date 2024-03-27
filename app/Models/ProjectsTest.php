<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdvisorySession;
use App\Models\UsersTest;
use App\Models\ProyectStudentTest;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectsTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'image',
        'general_information',
        'id_advisor_id'
    ];

    public function advisorySessions()
    {
        return $this->hasMany(AdvisorySession::class);
    }

    public function hasStudents()
    {
        return $this->hasMany(ProyectStudentTest::class, 'id_Proyect_id');
    }

    public function advisor()
    {
        return $this->belongsTo(UsersTest::class, 'id_advisor_id');
    }
    public function students()
    {
        return $this->belongsToMany(UsersTest::class, 'proyect_student_tests', 'id_Proyect_id', 'id_Student_id');
    }
}
