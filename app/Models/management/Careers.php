<?php

namespace App\Models\management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Careers extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['name', 'description', 'division_id'];

    public function division()
    {
        return $this->belongsTo(Division::class); // Relación con Division
    }
}
