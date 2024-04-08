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
                <label for="student" class="block text-sm font-medium text-gray-700">Estudiante</label>
                <select  name="student" id="student" class="mt-1 p-2 border border-gray-300 rounded-md w-full text-black" required>
                    <option value="" >Seleccionar Estudiante</option>
                    @foreach($studentsWithoutBook as $studentNoBook)
                        <option value="{{ $studentNoBook->id }}">{{ $studentNoBook->user_name." - ".$studentNoBook->registration_number }}</option>
                    @endforeach
                </select>
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
        const studentSelect = document.getElementById('student');
        const selectedStudentsList = document.getElementById('selectedStudentsList');
        const selectedStudents = []; // Array para almacenar los estudiantes seleccionados
        const valueStudents=[];
        const priceInput = document.getElementById('price');
        const form = document.querySelector('form');

        studentSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const selectedStudent = selectedOption.text;
            const selectedValue = selectedOption.value;
            const price = parseFloat(priceInput.value);
      
            // Verificar si el estudiante ya ha sido seleccionado
            
            if (selectedStudents.includes(selectedValue)) {
                alert('¡Este estudiante ya ha sido seleccionado!');
                console.log(selectedStudents);
            } else if(selectedValue===""){
                alert('selecciona un Usuario Valido');
            }else {
                // Verificar si ya se seleccionaron 
                if ((price >= 300 && price < 600 && selectedStudents.length < 1 ) ||
                (price >= 600 && price < 900 && selectedStudents.length < 2 ) ||
                (price >= 900 && selectedStudents.length < 3)) {
                       // Agregar el estudiante al array de seleccionados y a la lista
                       selectedStudents.push(selectedValue);
                       // Después de agregar un estudiante a la lista de seleccionados
document.getElementById('selectedStudents').value = JSON.stringify(selectedStudents);
                    const li = document.createElement('li');
                    li.textContent = selectedStudent;
                    selectedStudentsList.appendChild(li);
                    console.log(selectedStudents);
                    console.log(selectedStudentsList);
                    
                    
                } else {
                    studentSelect.value = "";
                    alert('No se pueden agregar más estudiantes o el precio del libro no cumple con los requisitos.');

                }
            }
        });

        // Listener para el cambio en el valor del precio
        priceInput.addEventListener('change', function() {
            const price = parseFloat(priceInput.value);
            console.log(selectedStudentsList);
            studentSelect.value = "";
                selectedStudents.splice(0, selectedStudents.length); // Limpiar completamente el array
                selectedStudentsList.innerHTML = '';

            // Limpiar la selección de estudiantes si el precio no cumple con los requisitos
            if ((price < 300) || (price >= 300 && price < 600 && selectedStudents.length > 1) ||
                (price >= 600 && price < 900 && selectedStudents.length > 2)) {
                studentSelect.value = "";
                selectedStudents.splice(0, selectedStudents.length); // Limpiar completamente el array
                selectedStudentsList.innerHTML = ''; // Limpiar la lista de estudiantes seleccionados
                console.log(selectedStudents)
            }
        });

       
    });
</script>

