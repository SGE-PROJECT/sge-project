@extends('layouts.panelUsers')

@section('titulo', 'Carreras')

@section('contenido')

    <div class="max-w-lg mx-auto bg-white mt-8 rounded p-6">
        <h1 class="text-2xl font-bold mb-5">Asignar asesorados</h1>
        <form action="{{ route('asignar') }}" id="asignar" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="role" class="block text-gray-700 text-sm font-bold mb-2">Seleccione al asesor:</label>
                <select name="advisor" id="role"
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    @foreach ($advisors as $asesor)
                        <option value="{{ $asesor->id }}">{{ $asesor->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Ingrese los asesorados: (Se deben
                    escribir las matriculas separadas por comas)</label>
                <textarea type="text" name="students" id="name"
                    class="shadow appearance-none border rounded resize-none h-[100px] w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required></textarea>
            </div>
            <div class="mb-4 flex">
                <input type="search" id="estudiantes" list="student-names" autocomplete="off" placeholder="Buscar matricula por nombre de asesorado"
                    class="shadow flex-grow appearance-none border rounded-tl rounded-bl w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required/>
                <i class="nf nf-oct-plus text-lg px-3 text-[#fff] bg-teal-500 flex items-center justify-center shadow rounded-tr rounded-br cursor-pointer active:scale-90 transition-all hover:bg-teal-600" onclick="addStudent()"></i>
            </div>
            <p class="hidden text-red-500 text-sm font-bold mb-3" id="error">No se encontró el usuario.</p>

            <datalist id="student-names">
                @foreach ($studentData as $student)
                    <option value="{{ $student['name'] }}">{{ $student['name'] }}</option>
                @endforeach
            </datalist>
            <div class="flex gap-5 w-full">
                <a href="{{ route('users.cruduser.index') }}"
                    class="w-full bg-teal-500 hover:bg-teal-600 text-center text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Volver
                </a>
                <button type="button" onclick="verifyRegistrationNumbers()"
                    class="w-full bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Asignar Estudiantes
                </button>

            </div>
    </div>
    </form>
    <script>
        document.getElementById('name').addEventListener('input', function(event) {
            var value = this.value;
            var cursorPosition = this.selectionStart - 1;
            var newValue = value.replace(/[^0-9,]/g, '');
            this.value = newValue;
            this.selectionStart = this.selectionEnd = cursorPosition + 1;
        });
        function addStudent() {
            const input = document.getElementById('estudiantes').value;
            const textarea = document.getElementById('name');
            const error = document.getElementById('error');
            error.classList.add('hidden');
            const students = @json($studentData);

            const student = students.find(s => s.name === input);

            if (student) {
                const registrationNumber = student.registration_number;
                if (textarea.value.split(',').indexOf(registrationNumber) === -1) {
                    textarea.value += (textarea.value ? ',' : '') + registrationNumber;
                }
            } else {
                error.classList.remove('hidden');
                error.innerHTML="Usuario no encontrado";
            }
            document.getElementById('estudiantes').value=" ";
        }
        function verifyRegistrationNumbers() {
            const textarea = document.getElementById('name');
            const registrationNumbers = textarea.value.split(',').map(num => num.trim());
            const students = @json($studentData);
            const error = document.getElementById('error');
            error.classList.add('hidden');

            for (let regNum of registrationNumbers) {
                const studentExists = students.some(student => student.registration_number === regNum);
                if (!studentExists) {
                    error.classList.remove('hidden');
                    error.innerHTML=`La matrícula ${regNum} no existe.`;
                    return;
                }
            }
            document.getElementById("asignar").submit();
        }
    </script>
    </div>

@endsection
