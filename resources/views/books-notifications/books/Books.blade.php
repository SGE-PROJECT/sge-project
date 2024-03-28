@extends('layouts.panel')

@section('titulo')
    Libros
@endsection

@section('contenido')
    <div class="container-bk">
        <h1 class="title-books"> - Libros -</h1>
        <div class="flex justify-between py-2">
            <div>
                <div class="search-scale">
                    <form action="{{ route('libros.index') }}" method="GET">
                        <input type="hidden" name="estado" value="{{ $estado }}">
                        <span class="flex">
                            <input id="searchInput" name="query" class="search_divisions px-3 outline-none border-l-5" type="text" placeholder="Buscar...">
                            <button id="searchButton" type="submit" class="search-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path strokeLinecap="round" strokeLinejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
                            </button>
                        </span>
                    </form>
                </div>
                <select id="selectOption" onchange="window.location.href=this.value" class="select-books-sd bg-teal-500">
                    <option disabled selected>Exportar Como</option>
                    <option value="{{ route('books.reports') }}">PDF</option>
                    <option value="{{ route('books.export') }}">EXCEL</option>
                </select>
                <a href="{{ route('libros.create') }}">
                    <button class="add-button-book bg-teal-500">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAALZJREFUSEvdlesNwyAMhO82aTZJR+kkHSWjhFGyiSsiJUoQGOy8pPIX7M8+zEFcvHhxfhQBItIDGAC8jEVMAD4kQ4zTACOACPGsiWRXA8h8gDTJKCK7OK2D5wBplVsNT+nABUiDLEmaOqgBlv3SSC3DUJTocYAmwykS/RdA8w73JbcakgVwxOwCyffO7DJjGp3063DUvF1rL7dVnty51U3vALg0r/0X2w5cmjcDjuisxZq+Q08RP2kHzhnqPM52AAAAAElFTkSuQmCC"/>                    </button>
                </a>
            </div>
            <div>
                <form action="{{ route('libros.index') }}" method="GET">
                    <select name="estado" id="estado" onchange="this.form.submit()"
                        class="select-books bg-teal-500">
                        <option value="todos" {{ $estado === 'todos' ? 'selected' : '' }}>Todos</option>
                        <option value="en-proceso" {{ $estado === 'en-proceso' ? 'selected' : '' }}>En proceso</option>
                        <option value="finalizado" {{ $estado === 'finalizado' ? 'selected' : '' }}>Finalizado</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="flex flex-wrap mx-10 gap-10 ctn-bk">
            <div class=" w-full">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 items-center">
                    @foreach ($books as $book)
                        <div class="container-card-book">

                            <a href="{{ route('libros.show', ['libro' => $book->slug]) }}">
                                <div class="card-book">
                                    <div class="card__content-book">
                                        @if ($book->estate === 0)
                                            <div class="tag-state-process bg-teal-500">En proceso</div>
                                        @elseif ($book->estate === 1)
                                            <div class="tag-state-finish bg-teal-500">Finalizado</div>
                                        @endif
                                        <img src="{{ asset('storage/images/books/' . $book->image_book) }}" alt="Imagen del libro">
                                        <div class="info-alumno">
                                            <p>Alumno: {{ $book->student }}</p>
                                            <p>Matrícula: {{ $book->tuition }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="shelf"></div>
                            <div class="buttons-container">
                                <form action="{{ route('libros.edit', ['libro' => $book->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="edit-button-book">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPdJREFUSEvVldERgkAMRLOdYCfSiVaiVqKdSClnJdFlgImR4wLCB/fDMBz7ktzOHmTjhY31ZTWAqt5F5AXgaov+AqjqUUS4sSp0VgNo+j2d+Kl7v1mIBzxFhJCp5cVZDP+zRQ0QD1Aq41NC5GxUtQKQ+HSQM4BHq2WFVDUM6MbCbtmRhbD6VnwxwM089ZCxrmd34MR7zQTg8DcgI07dYeYeEu4gKk6rWwuHAHPE6SbrwiIgKs7RjLkwAmit69bozNcCZA90DUBWfPGIIpFhQu8nCYpnsDtAJK5LTTUA6lzYMR0vgTshB2Hw0QjDZRTK/VLJU9/3D3gDazjBGbL5ohcAAAAASUVORK5CYII="/>
                                    </button>
                                </form>
                                <form action="{{ route('libros.destroy', ['libro' => $book->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button-book">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAJRJREFUSEvtlcENgCAMRfs301GcRJ1MRnGTag8kSoBaAh6UHhvyX/uBFtQ40FifVAAzD0S0JQpZASy5IrMARVx0dyKaALgU5AZgZq5hGc62vM67gBrVhxrROyi16mpN1CKf/BbAtx12FcsXWdQB6jPtFv3AIssAtHw02WCyySzhAIxPp6mIzwZIcrOpO9nSQuxsc8ABQHeaGbkbfj0AAAAASUVORK5CYII="/>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
