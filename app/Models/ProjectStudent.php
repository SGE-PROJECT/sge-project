<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'student_id',
        'is_main_student',
    ];
}
