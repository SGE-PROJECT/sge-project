<?php

namespace App\Models\management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $table = 'career';
    protected $guarded = [];
    protected $fillable = ['name', 'description', 'division_id'];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function careerImage()
    {
        return $this->hasOne(CareerImage::class);
    }

}
