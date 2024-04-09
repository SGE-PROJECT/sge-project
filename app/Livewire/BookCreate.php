<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class BookCreate extends Component
{
    public $title;
    public $description;
    public $author;
    public $editorial;
    public $year_published;
    public $price;
    public $student;
    public $selectedStudents=[];
    public $tuition;
    public $estate;
    public $studentsWithoutBook;

    public function render()
    {
         // Obtener todos los estudiantes cuyo book_id sea null y unir con la tabla de usuarios
         $this->studentsWithoutBook = Student::leftJoin('users', 'students.user_id', '=', 'users.id')
         ->whereNull('students.book_id')
         ->select('students.*', 'users.name as user_name') // Seleccionar los campos necesarios, incluyendo el nombre del usuario
         ->get();
        return view('livewire.book-create',[
            'studentsWithoutBook' => $this->studentsWithoutBook
        ]);
    }

    
    public function submitForm()
    {
          // Verificar si el precio cumple con las condiciones
    if (($this->price >= 300 && $this->price < 600 && count($this->selectedStudents) < 2) ||
     ($this->price >= 600 && $this->price < 900 && count($this->selectedStudents) < 3) || 
     ($this->price >= 900 && count($this->selectedStudents) <= 3)) {
        dd($this->selectedStudents);

    return redirect(route('dashboardProjects'))->with('error','El libro debe tener al menos dos estudiantes o no puede ser inferior a $30');
    } else {
        // Mostrar mensaje de error
        $this->addError('student', 'No se pueden agregar más estudiantes o el precio del libro no cumple con los requisitos.');
    }
   
    }
}
