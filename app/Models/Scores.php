<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Scores extends Model
{
    use HasFactory;
    protected $fillable = [
        'academic_advisor_id',
        'project_id',
        'score',
        'total_score'
    ];

    public function academicAdvisor()
    {
        return $this->belongsTo(AcademicAdvisor::class, 'academic_advisor_id');
    }
}
