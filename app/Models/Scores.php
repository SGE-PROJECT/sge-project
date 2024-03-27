<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Importa la clase User


class Scores extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'project_id',
        'score',
        'total_score'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
