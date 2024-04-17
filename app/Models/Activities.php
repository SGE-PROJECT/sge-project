<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AcademicAdvisor;

class Activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'id_advisor_id',
    ];

    public function academicAdvisor()
    {
        return $this->belongsTo(AcademicAdvisor::class, 'id_advisor_id');
    }
}
