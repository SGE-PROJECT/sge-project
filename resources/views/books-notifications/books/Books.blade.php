@extends('layouts.panel')

@section('titulo')
    Libros
@endsection

@section('contenido')
    <div class="container">
        <h1 class="text-2xl font-bold mb-4 mt-4">Libros:</h1>
        <div class="flex flex-wrap mx-10 gap-10 ctn-bk">
            <div class=" w-full"> <!-- Establecemos una altura máxima que equivalga a mostrar 4 libros -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <!-- Repite estas tarjetas según sea necesario -->
                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset('images/books/js-book.jpg') }}" alt="Imagen del libro">
                                <div>
                                </div>
                            </div>
                        </div>
                        <button class="button-books"> Ver Libro</button>
                    </div>
                    <!-- Repite estas tarjetas según sea necesario -->

                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset('images/books/js-book.jpg') }}" alt="Imagen del libro">
                                <div>
                                </div>
                            </div>
                        </div>
                        <button class="button-books"> Ver Libro</button>
                    </div>

                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset('images/books/js-book.jpg') }}" alt="Imagen del libro">
                                <div>
                                </div>
                            </div>
                        </div>
                        <button class="button-books"> Ver Libro</button>
                    </div>

                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset('images/books/js-book.jpg') }}" alt="Imagen del libro">
                                <div>
                                </div>
                            </div>
                        </div>
                        <button class="button-books"> Ver Libro</button>
                    </div>

                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset('images/books/js-book.jpg') }}" alt="Imagen del libro">
                                <div>
                                </div>
                            </div>
                        </div>
                        <button class="button-books"> Ver Libro</button>
                    </div>

                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset('images/books/js-book.jpg') }}" alt="Imagen del libro">
                                <div>
                                </div>
                            </div>
                        </div>
                        <button class="button-books"> Ver Libro</button>
                    </div>

                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset('images/books/js-book.jpg') }}" alt="Imagen del libro">
                                <div>
                                </div>
                            </div>
                        </div>
                        <button class="button-books"> Ver Libro</button>
                    </div>
                    
                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset('images/books/js-book.jpg') }}" alt="Imagen del libro">
                                <div>
                                </div>
                            </div>
                        </div>
                        <button class="button-books"> Ver Libro</button>
                    </div>

                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset('images/books/js-book.jpg') }}" alt="Imagen del libro">
                                <div>
                                </div>
                            </div>
                        </div>
                        <button class="button-books"> Ver Libro</button>
                    </div>

                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset('images/books/js-book.jpg') }}" alt="Imagen del libro">
                                <div>
                                </div>
                            </div>
                        </div>
                        <button class="button-books"> Ver Libro</button>
                    </div>

                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset('images/books/js-book.jpg') }}" alt="Imagen del libro">
                                <div>
                                </div>
                            </div>
                        </div>
                        <button class="button-books"> Ver Libro</button>
                    </div>

                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset('images/books/js-book.jpg') }}" alt="Imagen del libro">
                                <div>
                                </div>
                            </div>
                        </div>
                        <button class="button-books"> Ver Libro</button>
                    </div>

                    <div class="container-card-book">
                        <div class="card-book">
                            <div class="card__content-book">
                                <img src="{{ asset('images/books/js-book.jpg') }}" alt="Imagen del libro">
                                <div>
                                </div>
                            </div>
                        </div>
                        <button class="button-books"> Ver Libro</button>
                    </div>  

                </div>
            </div>
        </div>
    </div>
@endsection
