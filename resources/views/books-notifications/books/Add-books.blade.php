@extends('layouts.panel')

@section('titulo')
    Agregar libros
@endsection

@section('contenido')
    <div class="container">

        <div class="container-add-books">
            <div class="container-title-books">
                <h1 class="title-books">Agrega tu libro</h1>
            </div>

            <div class="container-form-books">
                <h2 class="subtitle-books">Por favor rellena los campos solicitados</h2>
                <form action="" method="post">
                    @csrf
                    <div class="container-inputs">
                        <div class="inputs-group-1">
                            <label class="labels-add-books" for="name-client">Nombre completo:</label>
                            <input class="inputs-add-books" type="text" id="name-client" name="name-client" required
                                placeholder="Ingresa tu nombre">

                            <label class="labels-add-books" for="title-book">Título del libro:</label>
                            <input class="inputs-add-books" type="email" id="title-book" name="title-book" required
                                placeholder="Ingresa el título del libro">

                            <label class="labels-add-books" for="author">Autor:</label>
                            <input class="inputs-add-books" type="text" id="author" name="author" required
                                placeholder="Ingresa el nombre del autor del libro">
                        </div>

                        <div class="inputs-group-2">
                            <label class="labels-add-books" for="id-client">Matrícula:</label>
                            <input class="inputs-add-books" type="number" id="id-client" name="id-client" required
                                placeholder="Ingresa tu matrícula">

                            <label class="labels-add-books" for="edition">Edición:</label>
                            <input class="inputs-add-books" type="text" id="edition" name="edition" required
                                placeholder="Ingresa la edición del libro">

                            <label class="labels-add-books" for="date-book">Fecha:</label>
                            <input class="inputs-add-books" type="date" id="date-book" name="date-book" required>
                        </div>
                    </div>

                    <div class="container-ticket-add-books">
                        <div class="ticket-add-books">
                            <label class="labels-add-books" for="file-book">Ticket:</label>
                            <input class="inputs-add-books" type="file" id="file-book" name="file-book" required>
                        </div>
                    </div>

                    <div class="button-add-books">
                        <button
                            class="bg-black hover:bg-teal-800 text-white font-bold py-3 px-6 rounded-md shadow-lg hover:text-white hover:shadow-green-900 transform transition-all duration-500 ease-in-out hover:scale-110 hover:brightness-110 active:animate-bounce">
                            Enviar
                        </button>
                    </div>


                </form>
            </div>

        </div>

    </div>
@endsection
