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
        <h1 class="title-books">- Libros -</h1>
        <div class="flex justify-between py-2 responsive-books">
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
                <div class="export-book">
                    @if (Auth::check() && Auth::user()->hasAnyRole(['Asistente de Dirección']))
                        <select id="selectOption" onchange="handleExport(this.value)"
                            class="select-books-sd bg-teal-500 focus:outline-double outline-white focus:ring focus:ring-slate-400">
                            <option disabled selected>Exportar Como</option>
                            <option value="{{ route('books.reports') }}" target="_blank">PDF</option>
                            <option value="{{ route('books.export') }}">EXCEL</option>
                        </select>
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
                        class="select-books bg-white border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 transition duration-150 ease-in-out">
                        <option value="todos" {{ $estado === 'todos' ? 'selected' : '' }}>Todos</option>
                        <option value="en-proceso" {{ $estado === 'en-proceso' ? 'selected' : '' }}>En proceso</option>
                        <option value="finalizado" {{ $estado === 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                    </select>
                </form>
            </div>
        </div>

        <br>

        <div class="flex flex-wrap mx-10 gap-10 ctn-bk space-book">
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
