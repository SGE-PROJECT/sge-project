<?php

namespace App\Models\management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_image extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliated_companie_id',
        'image_path',
    ];

    public function affiliatedCompany()
    {
        return $this->belongsTo(Affiliated_companie::class, 'affiliated_companie_id');
    }
}
