<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdvisorySessions;

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

    public function advisorySessions()
    {
        return $this->hasMany(AdvisorySession::class);
    }
}
