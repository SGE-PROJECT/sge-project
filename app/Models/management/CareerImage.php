<?php

namespace App\Models\management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerImage extends Model
{
    use HasFactory;


    protected $fillable = ['career_id', 'image_path'];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}
