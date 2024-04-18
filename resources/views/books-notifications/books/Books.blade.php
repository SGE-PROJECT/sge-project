@extends('layouts.panelUsers')

@section('titulo')
    Libros
@endsection

@section('contenido')
<style>
     <style>
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
        </style>
</style>
    <div class="container-bk">
        <h1 class="title-books uppercase mt-4">- Libros -</h1>
        <div class="flex justify-between responsive-books">
                <div class="search-scale search-book">
                    <form action="{{ route('libros.index') }}" method="GET">
                        <input type="hidden" name="estado" value="{{ $estado }}">
                        <span class="flex">
                            <input  id="search" name="query" type="text" class="search_divisions px-3 outline-none border-l-5"
                                type="text" placeholder="Buscar...">

                            <button id="searchButton" type="submit" class="search-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </button>
                        </span>
                    </form>
                </div>
                {{-- Exportar --}}
                <div class="export-book select-books-sd">
                    @if (Auth::check() && Auth::user()->hasAnyRole(['Asistente de Dirección']))
                        <!-- BOTÓN QUE NOS SIRVE PARA EXPORTAR LOS ARCHIVOS -->
        <div x-data="{ isActive: false }" class="relative ml-auto mr-6">
            <div class="inline-flex items-center overflow-hidden rounded-md border bg-white">
                <a class="w-full border-e px-4 py-3 text-sm/none text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                    Exportar
                </a>
                <button x-on:click="isActive = !isActive"
                    class="h-full p-2 text-gray-600 hover:bg-gray-50 hover:text-gray-700">
                    <span class="sr-only">Menu</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 01-1.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>

            <div class="absolute right-0 z-10 mt-2 w-56 rounded-md border border-gray-100 bg-white shadow-lg" role="menu"
                x-cloak x-transition x-show="isActive" x-on:click.away="isActive = false"
                x-on:keydown.escape.window="isActive = false">
                <div class="p-2">
                    <strong class="block p-2 text-xs font-medium uppercase text-gray-400"> Opciones </strong>
                    <label for="Option1" id="option1" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                        </div>
                        <div>
                            <a href="{{ route('books.reports')}}">
                            <strong class="font-medium text-gray-900"> PDF </strong>
                            </a>
                        </div>
                    </label>

                    <label for="Option2" id="option2" class="flex cursor-pointer items-start gap-4 mb-1">
                        <div class="flex items-center">
                            &#8203;
                        </div>

                        <div>
                            <a href="{{ route('books.export')}}">
                            <strong class="font-medium text-gray-900"> Excel </strong>
                            </a>
                        </div>
                    </label>

                </div>
            </div>
        </div>
                    @endif
                </div>

                <div class="create-book">
                    <a href="{{ route('libros.create') }}">
                        <button class="add-button-book bg-teal-500">
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAALZJREFUSEvdlesNwyAMhO82aTZJR+kkHSWjhFGyiSsiJUoQGOy8pPIX7M8+zEFcvHhxfhQBItIDGAC8jEVMAD4kQ4zTACOACPGsiWRXA8h8gDTJKCK7OK2D5wBplVsNT+nABUiDLEmaOqgBlv3SSC3DUJTocYAmwykS/RdA8w73JbcakgVwxOwCyffO7DJjGp3063DUvF1rL7dVnty51U3vALg0r/0X2w5cmjcDjuisxZq+Q08RP2kHzhnqPM52AAAAAElFTkSuQmCC" />
                        </button>
                    </a>
                </div>
            {{-- Filtrar --}}
            <div class="filter-book">
                <form action="{{ route('libros.index') }}" method="GET" class="form-books-select">
                    <select name="estado" id="estado" onchange="this.form.submit()"
                        class="select-books bg-white border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 transition duration-150 ease-in-out text-center">
                        <option value="todos" {{ $estado === 'todos' ? 'selected' : '' }}>Todos</option>
                        <option value="en-proceso" {{ $estado === 'en-proceso' ? 'selected' : '' }}>En proceso</option>
                        <option value="finalizado" {{ $estado === 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                    </select>

                </form>

            </div>

            <br>

        </div>

        <div class="mt-8 flex flex-wrap mx-10 gap-10 ctn-bk space-book">
            <div class=" w-full">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 items-center">
                    @foreach ($studentBook as $bookData)
                        <div id="cart-books" class="container-card-book">

                            <a href="{{ route('libros.show', ['libro' => $bookData['book']->slug]) }}">
                                <div class="card-book">
                                    <div class="card__content-book">
                                        @if ($bookData['book']->state === 0)
                                            <div class="tag-state-process bg-teal-500">En proceso</div>
                                        @elseif ($bookData['book']->state === 1)
                                            <div class="tag-state-finish bg-teal-500">Finalizado</div>
                                        @endif
                                        <img id="img-book-view" src="{{ $bookData['book']->image_book }}" alt="Imagen del libro" title="">
                                        <div class="info-alumno">
                                            @forelse ($bookData['students'] as $student )

                                        <p>Alumno:  {{$student->name}} </p>
                                        <p>Matrícula:  {{$student->tuition}}</p>

                                        @empty

                                        @endforelse
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="shelf"></div>
                            @if (Auth::check() && Auth::user()->hasAnyRole(['Asistente de Dirección']))
                                <div class="buttons-container">

                                    <form action="{{ route('libros.edit', ['libro' => $bookData['book']->id]) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="edit-button-book">
                                            <img
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPdJREFUSEvVldERgkAMRLOdYCfSiVaiVqKdSClnJdFlgImR4wLCB/fDMBz7ktzOHmTjhY31ZTWAqt5F5AXgaov+AqjqUUS4sSp0VgNo+j2d+Kl7v1mIBzxFhJCp5cVZDP+zRQ0QD1Aq41NC5GxUtQKQ+HSQM4BHq2WFVDUM6MbCbtmRhbD6VnwxwM089ZCxrmd34MR7zQTg8DcgI07dYeYeEu4gKk6rWwuHAHPE6SbrwiIgKs7RjLkwAmit69bozNcCZA90DUBWfPGIIpFhQu8nCYpnsDtAJK5LTTUA6lzYMR0vgTshB2Hw0QjDZRTK/VLJU9/3D3gDazjBGbL5ohcAAAAASUVORK5CYII=" />
                                        </button>
                                    </form>
                                    <form id="deleteForm{{ $bookData['book']->id }}"
                                        action="{{ route('libros.destroy', ['libro' => $bookData['book']->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmarEliminacion({{$bookData['book']->id }})"
                                            class="delete-button-book">
                                            <img
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAJRJREFUSEvtlcENgCAMRfs301GcRJ1MRnGTag8kSoBaAh6UHhvyX/uBFtQ40FifVAAzD0S0JQpZASy5IrMARVx0dyKaALgU5AZgZq5hGc62vM67gBrVhxrROyi16mpN1CKf/BbAtx12FcsXWdQB6jPtFv3AIssAtHw02WCyySzhAIxPp6mIzwZIcrOpO9nSQuxsc8ABQHeaGbkbfj0AAAAASUVORK5CYII=" />
                                        </button>
                                    </form>

                                </div>
                            @endif

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmarEliminacion(libroId) {
            if (confirm('¿Estás seguro de que quieres eliminar este libro?')) {
                // Si el usuario confirma, enviar el formulario de eliminación
                document.getElementById('deleteForm' + libroId).submit();
            } else {
                // Si el usuario cancela, no hacer nada
                console.log('La eliminación del libro ha sido cancelada.');
            }
        }
    </script>
    <script defer>
 function handleExport(url) {
        if (url) {
            window.open(url, '_blank');
        }
    }

    const searchInput = document.getElementById('search');

       // Función para filtrar los estudiantes basada en la búsqueda
       function filterBooks() {
  const searchText = searchInput.value.toLowerCase();
  const booksItems = Array.from(document.querySelectorAll('#cart-books'));

  booksItems.forEach(item => {
    // Aquí asumimos que quieres filtrar basado en el nombre del estudiante, debes cambiar el selector si es necesario
    const name = item.querySelector('.info-alumno p').textContent.toLowerCase();
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
     searchInput.addEventListener('input', filterBooks);

     document.querySelector('.search-book form').addEventListener('submit', function(e) {
  e.preventDefault(); // Evita el comportamiento predeterminado del formulario
  filterBooks();
});

        window.onload = function() {
            let imagesBooks = Array.from(document.querySelectorAll('#img-book-view'));
            console.log(imagesBooks);
            imagesBooks.forEach(function(img) {
                img.onerror = function() {
                    // Esta es la ruta de la imagen de respaldo que quieres mostrar
                    this.src = 'https://educacion2.com/wp-content/uploads/El-mejor-libro.jpg';
                };
            });
        };
    </script>
@endsection
