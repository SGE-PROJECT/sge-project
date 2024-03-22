<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use App\Models\management\Division;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'division_id',
        'password',
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function student()
    {
        return $this->hasOne(Student::class);
    }

    // Agrega una relación con el modelo Division, si existe
    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    // Agrega una relación con el modelo Secretary, si existe
    public function secretary()
    {
        return $this->hasOne(Secretary::class);
    }

    // Agrega una relación con el modelo AcademicDirector, si existe
    public function academicDirector()
    {
        return $this->hasOne(AcademicDirector::class);
    }

    // Agrega una relación con el modelo AcademicAdvisor, si existe

    public function academicAdvisor()
    {
        return $this->hasOne(AcademicAdvisor::class);
    }

}
