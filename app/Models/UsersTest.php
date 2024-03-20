<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdvisorySession;
use App\Models\ProjectsTest;
use App\Models\ProyectStudentTest;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UsersTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password',
        'avatar',
        'isActive',
    ];

    
    public function advisorySessionsUser()
    {
        return $this->hasMany(AdvisorySession::class);
    }
    
    public function hasProyect()
    {
        return $this->hasOne(ProyectStudentTest::class);
    }
    public function projects()
    {
        return $this->belongsToMany(ProjectsTest::class, 'proyect_student_tests', 'id_Student_id', 'id_Proyect_id');
    }
}
