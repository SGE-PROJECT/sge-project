<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'academic_advisor_id',
        'project_id',
        'content_message'
    ];

    public function academic_advisor()
    {
        return $this->belongsTo(AcademicAdvisor::class, 'academic_advisor_id');
    }
}
