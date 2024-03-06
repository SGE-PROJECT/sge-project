<?php

namespace App\Models\management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division_image extends Model
{
    use HasFactory;

    protected $fillable = [
        'division_id',
        'image_path',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }
}
