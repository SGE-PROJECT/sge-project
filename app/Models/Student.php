<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory ,Notifiable;

    protected $fillable =[
        'registration_number',
        'user_id',
        'group_id',
        'academic_advisor_id',
        'book_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function academicAdvisor()
    {
        return $this->belongsTo(AcademicAdvisor::class, 'academic_advisor_id');
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_students', 'student_id', 'project_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function routeNotificationForMail()
    {
        return $this->email; // Aquí asumimos que el campo de la base de datos para el correo electrónico es 'email'
    }

}
