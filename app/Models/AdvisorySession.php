<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\UsersTest;
use App\Models\ProjectsTest;

class AdvisorySession extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_date',
        'description',
        'is_confirmed',
        'id_user_id',
        'id_project_id',
    ];

    public function user()
    {
        return $this->belongsTo(UsersTest::class, 'id_user_id');
    }

    public function advisor()
    {
        return $this->belongsTo(ProjectsTest::class, 'id_project_id');
    }
}
