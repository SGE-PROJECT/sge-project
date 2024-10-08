<?php

namespace App\Models;

use App\Models\management\Affiliated_companie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname_student',
        'id_student',
        'group_student',
        'phone_student',
        'email_student',
        'startproject_date',
        'endproject_date',
        'name_project',
        'company_name',
        'company_address',
        'project_area',
        'general_objective',
        'problem_statement',
        'justification',
        'activities',
        'business_advisor_id',
        'is_project',
        'is_public',
        'status',
    ];

    protected $casts = [
        'startproject_date' => 'date',
        'endproject_date' => 'date',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Project_likes::class);
    }
    public function Scores()
    {
        return $this->hasMany(Scores::class);
    }
    public function students()
    {
        return $this->belongsToMany(Student::class, 'project_students', 'project_id', 'student_id');
    }
    public function advisorySessions()
    {
        return $this->hasMany(AdvisorySession::class, 'id_advisor_id');
    }


    public function businessAdvisor()
    {
        return $this->belongsTo(BusinessAdvisor::class, 'business_advisor_id');
    }


    //public function academicAdvisor()
    //{
      //  return $this->belongsTo(AcademicAdvisor::class, 'id_academic_advisor_id');
    //}

    //public function businessAdvisor()
    //{
      //  return $this->belongsTo(BusinessAdvisor::class, 'id_business_advisor_id');
    //}

    //public function company()
    //{
      //  return $this->belongsTo(Affiliated_companie::class, 'id_company_id');
    //}

}
