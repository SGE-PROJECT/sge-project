@extends('layouts.panelUsers')
@section('titulo')
    Agregar libro
@endsection

@section('contenido')
    <div class="container">
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

        <div class="container-add-books">
            <div class="container-title-books">
                <!-- <h1 class="title-books">Agrega tu libro</h1> -->
                <h1 class="text-3xl font-bold text-teal-600">Agrega tu libro</h1>

                <a class="a-container-return" href="{{ route('libro-student') }}">
                    <button id="button-return-books" type="submit"
                        class=" bg-teal-500 text-white px-6 py-2  hover:bg-teal-600 transition-colors">
                        <svg id="svg-add-books" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
                        </svg>
                    </button>
                </a>

            </div>

            <div class="container-form-books">
                <h2 class="font-bold text-2xl subtitle-books">Por favor rellena los campos solicitados</h2>
                <form id="formichido"   action="{{ route('crear.libro.estudiante') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container-inputs">
                        <div class="inputs-group-1">
                            <div class="container-label-input">
                                <!-- <label class="labels-add-books" for="name-client">Nombre completo:</label> -->
                                <label class="block text-sm font-medium text-gray-700" for="title">Título</label>
                                <input class="inputs-add-books bg-gray-100" type="text"  name="title" id="title" required
                                    placeholder="Ingresa el titulo">
                            </div>

                            <div class="container-label-input">
                                <label class="block text-sm font-medium text-gray-700" for="descripción">Descripción</label>
                                <textarea  name="description" id="description" cols="30" rows="10" class="inputs-add-books bg-gray-100" required></textarea>
                            </div>
                            @error('description')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror

                            <div class="container-label-input">
                                <label class="block text-sm font-medium text-gray-700" for="author">Autor</label>
                                <input class="inputs-add-books bg-gray-100"   type="text" name="author" id="author" required
                                    placeholder="Ingresa el nombre del autor del libro">
                            </div>
                        </div>

                        <div class="inputs-group-2">
                            <div class="container-label-input">
                                <label class="block text-sm font-medium text-gray-700" for="editorial">Editorial</label>
                                <input class="inputs-add-books bg-gray-100"  type="text" name="editorial" id="editorial" required
                                    placeholder="Ingresa tu matrícula">
                            </div>

                            <div class="container-label-input">
                                <label class="block text-sm font-medium text-gray-700" for="year_published">Año de publicación</label>
                                <input class="inputs-add-books bg-gray-100" min=0 type="number" name="year_published" id="year_published" required
                                    placeholder="Ingresa la edición del libro">
                            </div>

                            <div class="container-label-input">
                                <label class="block text-sm font-medium text-gray-700" for="price">Precio</label>
                                <input class="inputs-add-books bg-gray-100" min=0 type="number" name="price" id="price-books-add" required>
                            </div>
                            <div class="container-ticket-add-books">
                                <div class="ticket-add-books">
                                    <label class="block text-sm font-medium text-gray-700" for="search">Buscar Estudiante</label>
                                    <input class="inputs-add-books bg-gray-100" type="text" id="search" placeholder="Escribe para buscar...">
                                </div>
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


                

                        </div>
                    </div>


                    <div class="button-add-books">
                        <!--<button
                                                                                            class="bg-black hover:bg-teal-800 text-white font-bold py-3 px-6 rounded-md shadow-lg hover:text-white hover:shadow-green-900 transform transition-all duration-500 ease-in-out hover:scale-110 hover:brightness-110 active:animate-bounce">
                                                                                            Enviar
                                                                                        </button>-->
                                                                                        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-md button-books">Crear Libro</button>
                    </div>


                </form>
            </div>

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
