<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'author',
        'editorial',
        'year_published',
        'price',
        'student',
        'tuition',
        'image_book',
        'estate',
    ];
    protected static function boot()
{
    parent::boot();

    static::saving(function ($book) {
        $book->slug = Str::slug($book->title, '-');
    });
}


}
