<?php

namespace App\Models;

use App\Models\management\Division;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicAdvisor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payrol',
        'division_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'academic_advisor_id');
    }
}


