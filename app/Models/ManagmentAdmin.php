<?php

namespace App\Models;

use App\Models\management\Division;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManagmentAdmin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'division_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function division()
    {
        return $this->belongsTo(Division::class);
    }


}
