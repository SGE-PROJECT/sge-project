@extends('layouts.panelUsers')

@section('titulo')
Crear Libro
@endsection

@section('contenido')
<div>
    <style>

:root {
    --background: #ECF0F4;
    --white: white;
    --gray-light: #FAFBFC;
    --gray-borders: #ECF1F4;
    --gray-dark: #AEB7C2;
    --primary: #4dc9ae;
}
        /* Define las clases para la animación */
        .fade-in {
          animation: fadeIn 0.5s;
        }
        
        .fade-out {
          animation: fadeOut 0.5s forwards; /* 'forwards' mantiene el estado final de la animación */
        }
        
        /* Define las keyframes para las animaciones de entrada y salida */
        @keyframes fadeIn {
          from { opacity: 0; }
          to { opacity: 1; }
        }
        
        @keyframes fadeOut {
          from { opacity: 1; }
          to { opacity: 0; }
        }
        
        /* Clase para mantener el elemento oculto después de la animación de salida */
        .hidden {
          display: none !important;
        }

        #description{
            border: 1px solid var(--gray-borders);
    padding: 0.5rem;
    border-radius: 0.25rem;
    height: 3rem;
    transition: height 0.3s ease-in-out;
    resize: none;
    width: 100%;
        }
        #description:focus{
            outline: none;
    height: 5rem;
    border: 2px solid var(--primary);
        }
        </style>
        
    <div class="container p-10">
        <h1 class="text-3xl font-semibold mb-4">Crear Libro</h1>
        <form  id="formichido"   action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text"  name="title" id="title" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea   name="description" id="description" class="mt-1 p-2 border border-gray-300 rounded-md w-full" rows="4" required></textarea>
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700">Autor</label>
                <input   type="text" name="author" id="author" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('author')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="editorial" class="block text-sm font-medium text-gray-700">Editorial</label>
                <input   type="text" name="editorial" id="editorial" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('editorial')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="year_published" class="block text-sm font-medium text-gray-700">Año de Publicación</label>
                <input   min=0 type="number" name="year_published" id="year_published" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('year_published')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                <input  min=0 type="number" name="price" id="price-books-add" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('price')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="search" class="block text-sm font-medium text-gray-700">Buscar Estudiante</label>
                <input type="text" id="search" class="mt-1 p-2 border border-gray-300 rounded-md w-full" placeholder="Escribe para buscar...">
            </div>

            <div class="mb-4">
                <label for="student" class="block text-sm font-medium text-gray-700">Estudiantes</label>
                <ul  name="student" id="student" class="mt-1 p-2 border border-gray-300 rounded-md w-full text-black bg-white overflow-y-auto max-h-[150px] overscroll-none" required>
                    <span>Seleccionar Estudiante</span>
                    @foreach($studentsWithoutBook as $studentNoBook)
                        <li id="{{ $studentNoBook->id }}" class="p-1 cursor-pointer mb-2 hover:text-white hover:bg-slate-400 studentssel" >{{ $studentNoBook->user_name." - ".$studentNoBook->registration_number }}</li>
                    @endforeach
                </ul>
                @error('student')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>
                
            <div class="mb-4">
                <label for="selected_students" class="block text-sm font-medium text-gray-700">Estudiantes Seleccionados</label>
                <ul class=" bg-white" id="selectedStudentsList"></ul>
            </div>
           

            <input type="hidden" name="selected_students" id="selectedStudents" >
            @error('selected_students')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror

         

            <div class="mb-4">
                <label for="state" class="block text-sm font-medium text-gray-700">Estado</label>
                <select  name="state" id="state" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                    <option value="0">En proceso</option>
                    <option value="1">Finalizado</option>
                </select>
                @error('state')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-md button-books-update">Crear Libro</button>

        </form>
        <a href="{{ route('libros.index') }}" class="block">
            <button class="button-books-exit create-book-position bg-teal-500">Volver a la lista de libros</button>
        </a>
    </div>
</div>

<script defer>


    
        const selectedStudents = []; // Array para almacenar los estudiantes seleccionados
        const $studentSelected =Array.from(document.querySelectorAll(".studentssel"));
        const priceInputAdd = document.getElementById('price-books-add');
        const selectedStudentsList = document.getElementById('selectedStudentsList');
        let studentForBackend=document.getElementById('selectedStudents');
        
         $studentSelected.forEach(element => {
            element.addEventListener( "click", function(e){ 
                const priceBookAdd = parseFloat(priceInputAdd.value);
                console.log(priceBookAdd);
                // Verificar si el estudiante ya ha sido seleccionado
            if (selectedStudents.includes(element.id)) {
                alert('¡Este estudiante ya ha sido seleccionado!');
                console.log(selectedStudents);
                console.log('sdb');
                console.log(selectedStudentsList);
                
            } else if(element===""){
                alert('selecciona un Usuario Valido');
            }else {
                // Verificar si ya se seleccionaron 
                if ((priceBookAdd >= 300 && priceBookAdd < 600 && selectedStudents.length < 1 ) ||
                (priceBookAdd >= 600 && priceBookAdd < 900 && selectedStudents.length < 2 ) ||
                (priceBookAdd >= 900 && selectedStudents.length < 3)) {
                       //  selectedStudents son puro id
                       selectedStudents.push(element.id);
element.classList.add('selected-student', 'bg-teal-500', 'text-white');

                       // studentForBackend es puro id que lo hereda de selectedStudents
                       studentForBackend.value = JSON.stringify(selectedStudents);
                       // Al agregar un estudiante a la lista de seleccionados
const liAdd = document.createElement('li');
liAdd.innerHTML = `${element.textContent} <span class="remove-student" style="cursor:pointer;color:red;">X</span>`;
liAdd.setAttribute('data-student-id', element.id); // Asegúrate de asignar un identificador al elemento LI
selectedStudentsList.appendChild(liAdd);
                    /* const liAdd = document.createElement('li');
                    var newContent = document.createTextNode(element.innerHTML);
                    liAdd.appendChild(newContent);
                     selectedStudentsList.appendChild(liAdd);  */
                     console.log('los ids de los estudiantes seleccionados')
                    console.log(selectedStudents);
                    console.log('la lista de estudiantes actualizada el ul:')
                    console.log(selectedStudentsList);
                    console.log('se debio meter en la lista el:');
                    console.log(liAdd);
               console.log("entro aqui adicion");
                    
                } else {
                  
                    alert('No se pueden agregar más estudiantes o el precio del libro no cumple con los requisitos.');

                }
            }
         
        }) 
         });       
        // Listener para el cambio en el valor del precio
        priceInputAdd.addEventListener('blur', function(e) {
    e.preventDefault();
    const priceBook = parseFloat(priceInputAdd.value);
    console.log(selectedStudentsList);
    console.log(isNaN(priceBook));
   
    
    // Solo limpiar si el precio no cumple con las condiciones
    if ((priceBook < 300 && selectedStudents.length > 0) ||
        (priceBook >= 300 && priceBook < 600 && selectedStudents.length > 1) ||
        (priceBook >= 600 && priceBook < 900 && selectedStudents.length > 2) ||
        (priceBook >= 900 && selectedStudents.length > 3) || (isNaN(priceBook))) {
        selectedStudents.splice(0, selectedStudents.length); // Limpiar completamente el array
        selectedStudentsList.innerHTML = ''; // Borrar el HTML interno de la lista de estudiantes seleccionados
        studentForBackend.value = JSON.stringify(selectedStudents);
        // Actualizar la UI para reflejar que los estudiantes fueron deseleccionados
        $studentSelected.forEach(element => {
            element.classList.remove('bg-teal-500','text-white');
        });
    }
    console.log("revisión de precio al perder foco");
});

const searchInput = document.getElementById('search');
    const studentsList = document.getElementById('student');

     // Función para filtrar los estudiantes basada en la búsqueda
     function filterStudents() {
  const searchText = searchInput.value.toLowerCase();
  const studentItems = Array.from(studentsList.querySelectorAll('li'));

  studentItems.forEach(item => {
    const name = item.textContent.toLowerCase();
    const isVisible = name.includes(searchText);
    
    // Usa requestAnimationFrame para asegurar que las clases se añaden en el orden correcto para la animación
    if (isVisible) {
      requestAnimationFrame(() => {
        item.classList.remove('fade-out', 'hidden');
        item.classList.add('fade-in');
      });
    } else {
      requestAnimationFrame(() => {
        item.classList.remove('fade-in');
        item.classList.add('fade-out');
      });

      // Una vez que la animación de salida se completa, añade la clase 'hidden'
      item.addEventListener('animationend', () => {
        if (!item.classList.contains('fade-in')) {
          item.classList.add('hidden');
        }
      }, { once: true });
    }
  });
}


    // Evento de escucha para el campo de búsqueda
    searchInput.addEventListener('input', filterStudents);

    selectedStudentsList.addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-student')) {
        const studentId = e.target.parentElement.getAttribute('data-student-id');
        // Encuentra el estudiante en la lista original y quita las clases
        const studentToRemove = document.querySelector(`.studentssel[id="${studentId}"]`);
        if (studentToRemove) {
            studentToRemove.classList.remove('selected-student', 'bg-teal-500', 'text-white');
        }

        // Remueve el estudiante del arreglo de estudiantes seleccionados
        const index = selectedStudents.indexOf(studentId);
        if (index > -1) {
            selectedStudents.splice(index, 1);
            studentForBackend.value = JSON.stringify(selectedStudents);
        }
        // Remueve el elemento de la lista
        e.target.parentElement.remove();
    }
});


 document.addEventListener('DOMContentLoaded', function () {
    const formichido= document.getElementById('formichido')
    formichido.addEventListener('submit', function (e) {
        if (selectedStudents.length === 0) {
        e.preventDefault(); // Previene que el formulario se envíe
        alert('Debes seleccionar al menos un estudiante.');
    }
    });
}); 




       

</script>



@endsection
