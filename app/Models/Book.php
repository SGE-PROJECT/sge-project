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
        'image_book',
        'state',
    ];
    protected static function boot()
    {
        parent::boot();
    
        // Generar o regenerar el slug antes de guardar o actualizar el libro
        static::saving(function ($book) {
            $originalSlug = $slug = Str::slug($book->title, '-');
            $counter = 1;
    
            // Verificar la existencia de un slug similar
            while (static::where('slug', $slug)->exists()) {
                // Si existe un slug similar, agregar un sufijo numérico
                $slug = $originalSlug . '-' . $counter++;
            }
    
            // Asignar el slug generado al libro
            $book->slug = $slug;
        });
    
        // Regenerar el slug si el título del libro se actualiza
        static::updating(function ($book) {
            // Generar el slug basado en el nuevo título
            $newSlug = Str::slug($book->title, '-');
    
            // Verificar si el nuevo slug es diferente al anterior
            if ($newSlug !== $book->slug) {
                $originalSlug = $slug = $newSlug;
                $counter = 1;
    
                // Verificar la existencia de un slug similar
                while (static::where('slug', $slug)->exists()) {
                    // Si existe un slug similar, agregar un sufijo numérico
                    $slug = $originalSlug . '-' . $counter++;
                }
    
                // Actualizar el slug con el contador
                $book->slug = $slug;
            }
        });
    }
    

}
