<?php

namespace App\Models\management;

use App\Models\AcademicAdvisor;
use App\Models\AcademicDirector;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\management\Division_image;
use App\Models\Secretary;

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

    public function academicDirector()
    {
        return $this->hasMany(AcademicDirector::class);
    }

    public function academicAdvisor()
    {
        return $this->hasMany(AcademicAdvisor::class);
    }

    public function secretary()
    {
        return $this->hasOne(Secretary::class);
    }
}
