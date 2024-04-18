<?php

namespace App\Models\management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramImage extends Model
{
    use HasFactory;


    protected $fillable = ['program_id', 'image_path'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
