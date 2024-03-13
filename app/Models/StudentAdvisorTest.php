<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UsersTest;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class StudentAdvisorTest extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_Asesor_id',
        'id_Student_id',
    ];

    public function Asesor()
    {
        return $this->belongsTo(UsersTest::class, 'id_Asesor_id');
    }

    public function Student()
    {
        return $this->belongsTo(UsersTest::class, 'id_Student_id');
    }
}
