@extends('layouts.panel')
@section('titulo')
    Registro de usuario
@endsection

@section('contenido')
    <section class="section">
        <form class="mx-auto p-8">
            <div class="bg-teal-500 w-full p-4 rounded-t-lg">
                <h1 class="text-3xl mb-0" style="color: white">Registrar usuario</h1>
            </div>
            <div class="contenido bg-white p-4 rounded-b-lg  shadow-lg">
                <h2 class=" font-medium text-teal-500 mb-6">Todos los campos son obligatorios</h2>
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <div>
                            <div class="form-control">
                                <input type="value" required="">
                                <label>
                                    <span style="transition-delay:0ms">N</span><span
                                        style="transition-delay:50ms">o</span><span
                                        style="transition-delay:100ms">m</span><span
                                        style="transition-delay:150ms">b</span><span
                                        style="transition-delay:200ms">r</span><span style="transition-delay:250ms">e</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <div class="form-control">
                                <input type="value" required="">
                                <label>
                                    <span style="transition-delay:0ms">C</span><span
                                        style="transition-delay:50ms">o</span><span
                                        style="transition-delay:100ms">r</span><span
                                        style="transition-delay:150ms">r</span><span
                                        style="transition-delay:200ms">e</span><span
                                        style="transition-delay:250ms">o</span><span
                                        style="transition-delay:250ms"></span><span
                                        style="transition-delay:250ms">E</span><span
                                        style="transition-delay:250ms">l</span><span
                                        style="transition-delay:250ms">e</span><span
                                        style="transition-delay:250ms">c</span><span
                                        style="transition-delay:250ms">t</span><span
                                        style="transition-delay:250ms">r</span><span
                                        style="transition-delay:250ms">o</span><span
                                        style="transition-delay:250ms">n</span><span
                                        style="transition-delay:250ms">i</span><span
                                        style="transition-delay:250ms">c</span><span style="transition-delay:250ms">o</span>
                                </label>
                            </div>
                        </div>
                        <div>
                            <div class="form-control">
                                <input type="number" required="">
                                <label>
                                    <span style="transition-delay:0ms">E</span><span
                                        style="transition-delay:50ms">d</span><span
                                        style="transition-delay:100ms">a</span><span style="transition-delay:150ms">d</span>
                                </label>
                            </div>
                        </div>

                    </div>
                    <div class="text-center">
                        <div class="mb-6">
                            <label class="block font-bold text-gray-700 mb-2">Rol</label>
                            <div class="select-wrapper">
                                <select name="rol" id="rol" class="select" onchange="zoomEffect()">
                                    <option value="administrador" selected>Administrador</option>
                                    <option value="coordinador">Coordinador</option>
                                    <option value="Directora">Directora</option>
                                    <option value="Asesor_academico">Asesor Académico</option>
                                    <option value="Asesor_empresa">Asesor Empresarial</option>
                                    <option value="estudiante">Estudiante</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block font-bold text-gray-700 mb-2">Foto de perfil</label>
                            <div class="flex justify-center">
                                <div class="w-32 h-32 bg-gray-200 rounded-full overflow-hidden">
                                    <img id="preview-image" src="https://via.placeholder.com/150" alt="Preview"
                                        class="object-cover">
                                </div>
                            </div>
                            <br>
                            <label for="foto-input"
                                class="w-full bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition-colors">
                                Seleccionar foto
                            </label>
                            <input type="file" name="foto" id="foto-input" class="hidden">
                        </div>




                    </div>
                </div>
                <div class="flex justify-center mt-6">
                    <button type="submit"
                        class=" bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition-colors">Agregar
                        Usuario</button>

                </div>
            </div>

        </form>
    </section>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('foto-input').addEventListener('change', function(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var dataURL = e.target.result;
                    var previewImage = document.getElementById('preview-image');
                    previewImage.src = dataURL;
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    });

    // Obtener el elemento select
    var selectRol = document.getElementById("rol");

    // Función para cambiar el tamaño del select al hacer clic
    selectRol.addEventListener("click", function() {
        this.style.transform = "scale(1.1)";
    });

    // Función para restablecer el tamaño del select cuando pierde el foco
    selectRol.addEventListener("blur", function() {
        this.style.transform = "scale(1)";
    });
</script>

<style>
    .select {
        width: 80%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        transition: all 0.3s ease;
        outline: none;
    }

    .select:focus {
        border-color: #00ffea;
        box-shadow: 0 0 5px #007756;
    }
</style>
