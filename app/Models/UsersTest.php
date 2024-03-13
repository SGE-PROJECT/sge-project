<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdvisorySession;
use App\Models\ProjectsTest;
use App\Models\ProyectStudentTest;

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
}
