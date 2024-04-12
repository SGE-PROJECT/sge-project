@extends('layouts.panelUsers')
@section('titulo')
    Agregar libro
@endsection

@section('contenido')
    <div class="container">

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
                <form action="" method="post">
                    @csrf
                    <div class="container-inputs">
                        <div class="inputs-group-1">
                            <div class="container-label-input">
                                <!-- <label class="labels-add-books" for="name-client">Nombre completo:</label> -->
                                <label class="block text-sm font-medium text-gray-700" for="name-client">Nombre
                                    completo</label>
                                <!-- <input class="inputs-add-books" type="text" id="name-client" name="name-client" required
                                        placeholder="Ingresa tu nombre"> -->
                                <input class="inputs-add-books bg-gray-100" type="text" id="name-client" name="name-client" required
                                    placeholder="Ingresa tu nombre">
                            </div>

                            <div class="container-label-input">
                                <label class="block text-sm font-medium text-gray-700" for="title-book">Título del
                                    libro</label>
                                <input class="inputs-add-books bg-gray-100" type="email" id="title-book" name="title-book" required
                                    placeholder="Ingresa el título del libro">
                            </div>

                            <div class="container-label-input">
                                <label class="block text-sm font-medium text-gray-700" for="author">Autor</label>
                                <input class="inputs-add-books bg-gray-100" type="text" id="author" name="author" required
                                    placeholder="Ingresa el nombre del autor del libro">
                            </div>
                        </div>

                        <div class="inputs-group-2">
                            <div class="container-label-input">
                                <label class="block text-sm font-medium text-gray-700" for="id-client">Matrícula</label>
                                <input class="inputs-add-books bg-gray-100" type="number" id="id-client" name="id-client" required
                                    placeholder="Ingresa tu matrícula">
                            </div>

                            <div class="container-label-input">
                                <label class="block text-sm font-medium text-gray-700" for="edition">Edición</label>
                                <input class="inputs-add-books bg-gray-100" type="text" id="edition" name="edition" required
                                    placeholder="Ingresa la edición del libro">
                            </div>

                            <div class="container-label-input">
                                <label class="block text-sm font-medium text-gray-700" for="date-book">Fecha</label>
                                <input class="inputs-add-books bg-gray-100" type="date" id="date-book" name="date-book" required>
                            </div>
                        </div>
                    </div>

                    <div class="container-ticket-add-books">
                        <div class="ticket-add-books">
                            <label class="block text-sm font-medium text-gray-700" for="file-book">Ticket</label>
                            <input class="inputs-add-books bg-gray-100" type="file" id="file-book" name="file-book" required>
                        </div>
                    </div>

                    <div class="button-add-books">
                        <!--<button
                                                                                            class="bg-black hover:bg-teal-800 text-white font-bold py-3 px-6 rounded-md shadow-lg hover:text-white hover:shadow-green-900 transform transition-all duration-500 ease-in-out hover:scale-110 hover:brightness-110 active:animate-bounce">
                                                                                            Enviar
                                                                                        </button>-->
                        <button id="button-send-books" type="submit"
                            class=" bg-teal-500 text-white px-6 py-2 rounded hover:bg-teal-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5" />
                            </svg>
                        </button>
                    </div>


                </form>
            </div>

        </div>

    </div>
@endsection
