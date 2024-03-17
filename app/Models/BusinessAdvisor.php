<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessAdvisor extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user_id');
    }
}
