<?php

namespace App\Models\management;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliated_companie extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_name',
        'address',
        'contact_name',
        'contact_email',
        'contact_phone',
        'description',
        'affiliation_date',
    ];

    protected $casts = [
        'affiliation_date' => 'date',
    ];
}
