<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\UsersTest;
use App\Models\ProjectsTest;

class ProyectStudentTest extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_Proyect_id',
        'id_Student_id',
    ];

    public function project()
    {
        return $this->belongsTo(ProjectsTest::class, 'id_Proyect_id');
    }

    public function student()
    {
        return $this->belongsTo(UsersTest::class, 'id_Student_id');
    }
}
