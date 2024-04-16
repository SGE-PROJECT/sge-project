<?php

namespace App\Models\management;

use App\Models\Academy;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'division_id',
        'start_date',
        'end_date',
        'isActive',
        'academy_id',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }
    public function programImage()
    {
        return $this->hasOne(ProgramImage::class, 'program_id');
    }

    public function academy()
    {
        return $this->belongsTo(Academy::class, 'academy_id');
    }
}
