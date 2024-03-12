<?php

namespace App\Models\management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\management\Division_image;

class Division extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'name',
        'description',
    ];

    public function divisionImage()
    {
        return $this->hasOne(Division_image::class, 'division_id');
    }
}
