<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Project_likes extends Model
{
    use HasFactory;
    protected $fillable = [
        'academic_advisor_id',
        'project_id',
    ];

    public function academicAdvisor()
    {
        return $this->belongsTo(AcademicAdvisor::class, 'academic_advisor_id');
    }


}
