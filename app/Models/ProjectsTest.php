<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdvisorySessions;

class ProjectsTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'general_information'
    ];

    public function advisorySessions()
    {
        return $this->hasMany(AdvisorySession::class);
    }
}
