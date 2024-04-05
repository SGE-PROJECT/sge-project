<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear los 10 registros de libros utilizando el Factory
        foreach ($this->getBookData() as $bookData) {
        Book::factory()->create($bookData);
        }
    }

    /**
     * Obtener los datos de los libros.
     *
     * @return array
     */
    private function getBookData(): array
    {
        return [
            [
                'title' => 'Programación orientada a objetos con C++ y Java.',
                'description' => 'Sumérgete en el mundo de la programación orientada a objetos con este libro, que cubre tanto C++ como Java, ofreciendo una guía completa desde los fundamentos hasta técnicas avanzadas, ideal para desarrolladores en busca de un dominio sólido en POO.',
                'author' => 'Autor 1',
                'editorial' => 'Editorial 1',
                'year_published' => 2022,
                'price' => 300,
                'student' => 'Francisco',
                'tuition' => '23564578',
                'image_book' => 'c-book.jpg',
                'estate' => false,
            ],
            [
                'title' => "Certificado de profesionalidad en programación",
                'description' => "Este certificado ofrece una sólida formación en programación, abordando desde los conceptos básicos hasta las habilidades avanzadas necesarias en el mundo laboral actual, proporcionando una base sólida para el éxito en el campo de la programación.",
                'author' => 'Autor 2',
                'editorial' => 'Editorial 2',
                'year_published' => 2023,
                'price' => 350,
                'student' => 'Gael',
                'tuition' => '23564578',
                'image_book' => 'cert-book.jpg',
                'estate' => true,
            ],
            [
                'title' => "Programación orientada a objetos con Java",
                'description' => "Sumérgete en el mundo de la programación orientada a objetos con este libro enfocado en Java, que ofrece una guía completa desde los fundamentos hasta las técnicas avanzadas, ideal para desarrolladores en busca de un dominio sólido en POO con este lenguaje.",
                'author' => 'Autor 3',
                'editorial' => 'Editorial 3',
                'year_published' => 2024,
                'price' => 320,
                'student' => 'Andrea',
                'tuition' => '23564578',
                'image_book' => 'java-book.jpg',
                'estate' => true,
            ],
            [
                'title' => "Pilares de la programación orientada a objetos con Java",
                'description' => "Explora los fundamentos esenciales de la programación orientada a objetos con Java, desglosando los pilares clave que sustentan este paradigma de desarrollo. Desde la encapsulación hasta la herencia y la polimorfismo, este libro te guiará a través de los conceptos fundamentales para dominar la programación orientada a objetos en Java.",
                'author' => 'Autor 4',
                'editorial' => 'Editorial 4',
                'year_published' => 2025,
                'price' => 310,
                'student' => 'Ceana',
                'tuition' => '23564578',
                'image_book' => 'java-poo-book.jpg',
                'estate' => false,
            ],
            [
                'title' => "Introducción moderna a la programación con Javascript",
                'description' => "Una introducción fresca a la programación con JavaScript, explorando desde los fundamentos hasta las últimas tendencias para crear aplicaciones web dinámicas y escalables. Este libro te sumerge en el mundo de JavaScript de manera accesible y actualizada.",
                'author' => 'Autor 5',
                'editorial' => 'Editorial 5',
                'year_published' => 2023,
                'price' => 280,
                'student' => 'Guillermo',
                'tuition' => '23564578',
                'image_book' => 'js-book.jpg',
                'estate' => true,
            ],
            [
                'title' => "Lógica de programación orientada a objetos",
                'description' => "Domina la lógica de la programación orientada a objetos con este libro conciso. Desde la conceptualización hasta la implementación, explora cómo estructurar y diseñar sistemas robustos utilizando principios fundamentales de la POO.",
                'author' => 'Autor 6',
                'editorial' => 'Editorial 6',
                'year_published' => 2024,
                'price' => 290,
                'student' => 'Joshua',
                'tuition' => '23564578',
                'image_book' => 'logica-book.jpg',
                'estate' => true,
            ],
            [
                'title' => "Algoritmos y programación en Java",
                'description' => "Descubre la magia de los algoritmos y la programación en Java con este libro. Desde la teoría hasta la práctica, adéntrate en la resolución de problemas y la optimización de código en uno de los lenguajes más versátiles",
                'author' => 'Autor 7',
                'editorial' => 'Editorial 7',
                'year_published' => 2023,
                'price' => 330,
                'student' => 'Adiel',
                'tuition' => '23564578',
                'image_book' => 'logica-java-book.jpg',
                'estate' => true,
            ],
            [
                'title' => "Metodología de la pragramación orientada a objetos",
                'description' => "Explora la metodología de la programación orientada a objetos en este libro conciso. Desde la planificación hasta la implementación, aprende a diseñar sistemas flexibles y mantenibles utilizando principios sólidos de la POO.",
                'author' => 'Autor 8',
                'editorial' => 'Editorial 8',
                'year_published' => 2025,
                'price' => 300,
                'student' => 'David',
                'tuition' => '23564578',
                'image_book' => 'metodologia-book.jpg',
                'estate' => false,
            ],
            [
                'title' => "Modelo y diseño orientado a objetos",
                'description' => "Sumérgete en el mundo del modelo y diseño orientado a objetos con este libro esencial. Desde la conceptualización hasta la implementación, aprende a crear sistemas eficientes y escalables utilizando las mejores prácticas de diseño.",
                'author' => 'Autor 9',
                'editorial' => 'Editorial 9',
                'year_published' => 2022,
                'price' => 310,
                'student' => 'Angel',
                'tuition' => '23564578',
                'image_book' => 'model-book.jpg',
                'estate' => true,
            ],
            [
                'title' => "Buenas prácticas de programación orientada a objetos en Java",
                'description' => "Descubre las mejores prácticas de programación orientada a objetos en Java con este libro. Desde la estructuración del código hasta la optimización, aprende a desarrollar aplicaciones robustas y mantenibles siguiendo estándares de calidad.",
                'author' => 'Autor 10',
                'editorial' => 'Editorial 10',
                'year_published' => 2023,
                'price' => 320,
                'student' => 'Paloma',
                'tuition' => '23564578',
                'image_book' => 'poo-book.jpg',
                'estate' => true,
            ]
        ];
    }
}
