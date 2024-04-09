<div>
    <div class="container p-10">
        <h1 class="text-3xl font-semibold mb-4">Crear Libro</h1>
        <form    action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                <input type="text" wire:model="title" name="title" id="title" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('title')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea wire:model="description"  name="description" id="description" class="mt-1 p-2 border border-gray-300 rounded-md w-full" rows="4" required></textarea>
                @error('description')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="author" class="block text-sm font-medium text-gray-700">Autor</label>
                <input wire:model="author"  type="text" name="author" id="author" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('author')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="editorial" class="block text-sm font-medium text-gray-700">Editorial</label>
                <input wire:model="editorial"  type="text" name="editorial" id="editorial" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('editorial')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="year_published" class="block text-sm font-medium text-gray-700">Año de Publicación</label>
                <input wire:model="year_published"  min=0 type="number" name="year_published" id="year_published" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('year_published')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Precio</label>
                <input wire:model.live="price"  min=0 type="number" name="price" id="price" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('price')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="student" class="block text-sm font-medium text-gray-700">Estudiantes</label>
                <ul  name="student" id="student" class="mt-1 p-2 border border-gray-300 rounded-md w-full text-black bg-white" required>
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
                <ul id="selectedStudentsList"></ul>
            </div>
           

            <input type="hidden" name="selected_students" id="selectedStudents" wire:model="selectedStudents">

            <div class="mb-4">
                <label for="tuition" class="block text-sm font-medium text-gray-700">Matrícula</label>
                <input wire:model="tuition" type="text" name="tuition" id="tuition" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                @error('tuition')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="estate" class="block text-sm font-medium text-gray-700">Estado</label>
                <select wire:model="state" name="estate" id="estate" class="mt-1 p-2 border border-gray-300 rounded-md w-full" required>
                    <option value="0">En proceso</option>
                    <option value="1">Finalizado</option>
                </select>
                @error('estate')
                    <p class="text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-md button-books">Crear Libro</button>

        </form>
        <a href="{{ route('libros.index') }}" class="block">
            <button class="button-books create-book-position bg-teal-500">Volver a la lista de libros</button>
        </a>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const selectedStudents = []; // Array para almacenar los estudiantes seleccionados
        const studentSelect = document.getElementById('student');
        const $studentSelected =Array.from(document.querySelectorAll(".studentssel"));
        const priceInput = document.getElementById('price');
        const selectedStudentsList = document.getElementById('selectedStudentsList');
        let studentForBackend=document.getElementById('selectedStudents');
        
         $studentSelected.forEach(element => {
            element.addEventListener( "click", function(e){ 
                const price = parseFloat(priceInput.value);
                console.log(price);
                // Verificar si el estudiante ya ha sido seleccionado
            if (selectedStudents.includes(element.id)) {
                alert('¡Este estudiante ya ha sido seleccionado!');
                console.log(selectedStudents);
            } else if(element===""){
                alert('selecciona un Usuario Valido');
            }else {
                // Verificar si ya se seleccionaron 
                if ((price >= 300 && price < 600 && selectedStudents.length < 1 ) ||
                (price >= 600 && price < 900 && selectedStudents.length < 2 ) ||
                (price >= 900 && selectedStudents.length < 3)) {
                       // Agregar el estudiante al array de seleccionados y a la lista
                       selectedStudents.push(element.id);
                       element.classList.add('bg-teal-500','text-white');
                       // Después de agregar un estudiante a la lista de seleccionados
                       studentForBackend.value = JSON.stringify(selectedStudents);
                    const li = document.createElement('li');
                    var newContent = document.createTextNode(element.innerHTML);
                    li.appendChild(newContent);
                  /*   li.textContent = selectedStudent;  */
                    selectedStudentsList.appendChild(li);
                    console.log(selectedStudents);
                    console.log(selectedStudentsList);
               console.log("entro aqui adicion");
                    
                } else {
                  
                    alert('No se pueden agregar más estudiantes o el precio del libro no cumple con los requisitos.');

                }
            }
         
        }) 
         });       
        // Listener para el cambio en el valor del precio
        priceInput.addEventListener('blur', function() {
                const price = parseFloat(priceInput.value);
                  console.log(selectedStudentsList);
                    selectedStudents.splice(0, selectedStudents.length); // Limpiar completamente el array
                    selectedStudentsList.innerHTML = '';  
                   console.log("entro aqui eliminacion");
        });

       
    });
</script>

