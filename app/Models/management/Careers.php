<?php

namespace App\Models\management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Careers extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = ['name', 'description', 'division_id'];

    public function divisionConnect()
    {
        return $this->belongsTo(Division::class);
    }

    public function careerImage()
    {
        return $this->hasOne(CareerImage::class);
    }

}
