@extends('layouts.panelUsers')
@section('titulo')
    Libro
@endsection
@section('contenido')
<style>
    .subtitle-book{
        font-weight: 600;
    }
    .h1-book-student{
        font-size: 40px;
        line-height: 38px   
    }
    .h1-book-stu{
        font-size: 40px;   
    }
    .title-book-student{
        font-size: 30px;
        line-height: 38px
    }
    .img-book-student{
    box-shadow: 0px 0px 20px 2px rgb(204, 204, 205);

    }
</style>
<main class="flex justify-evenly pt-10 rounded font-poppins">
    @forelse ($book as $bk )
    <div class=" w-[820px] h-auto img-book-student flex-wrap border-gray-400 border-[1px] rounded flex flex-col items-center p-4 relative">

        <h1 class=" h1-book-student  font-semibold flex items-center  mb-2 gap-2 "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" ><path fill="currentColor" d="M6.75 22q-1.125 0-1.937-.763T4 19.35V5.4q0-.95.588-1.7t1.537-.95L16 .8v16l-9.475 1.9q-.225.05-.375.238T6 19.35q0 .275.225.463T6.75 20H18V4h2v18zM7 16.575l2-.4V4.225l-2 .4z"/></svg> Libro<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M6.75 22q-1.125 0-1.937-.763T4 19.35V5.4q0-.95.588-1.7t1.537-.95L16 .8v16l-9.475 1.9q-.225.05-.375.238T6 19.35q0 .275.225.463T6.75 20H18V4h2v18zM7 16.575l2-.4V4.225l-2 .4z"/></svg></h1>
        <div class=" bg-gray-200 p-2  flex flex-col items-center justify-center py-5  rounded">   
            <h1 id="title-book-student" class="title-book-student text-clip mb-4 font-bold  text-balance text-center bg-gradient-to-r from-slate-600  to-slate-500 inline-block text-transparent bg-clip-text">{{$bk->title}}</h1>
            <div class=" sm:flex gap-6 px-3 flex-wrap">
                <div class="  min-h-[300px] min-w-[260px] hover:scale-[1.02] duration-300">
                    <img  class="img-book-student  h-full w-full rounded"  src="{{$bk->image_book}}" alt="Imagen del libro">
                </div>
                <div class="flex-1">
                    <div class=" mb-2">
                        @if ($bookCollaborative->count()>1)     
                        <h1 class="bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text subtitle-book mb-1">Colaboradores:</h1>
                        @foreach ($bookCollaborative as $bkcol )
                        <span class=" flex items-center mb-2 gap-1"><svg class=" text-slate-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887q.375-.375.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75q0 .375-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1q-.375-.375-.375-.888t.375-.887z"/></svg>
    
                            <p class=" font-medium border-blue-500 bg-blue-400 text-white rounded-full p-[3px] px-2 border-[2px] ">{{$bkcol->name}}</p>   
                        </span>
                        @endforeach
                        @else
                        <h1 class="subtitle-book font-medium bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Colaborador:</h1>
                        @foreach ($bookCollaborative as $bkcol )
                        <p class=" font-medium text-slate-700  ">{{$bkcol->name}}</p>   
                        @endforeach
                        @endif
                    </div>
                    <div class=" mt-3 flex flex-col">

                        <h1 class="subtitle-book font-medium bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Descripción:</h1>
                        <p class=" font-medium text-slate-700  ">{{$bk->description}}</p>
                    </div>
                    <div class=" mt-3 flex flex-col">

                        <h1 class="subtitle-book font-medium bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Autor:</h1>
                        <p class=" font-medium text-slate-700 ">{{$bk->author}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class=" flex flex-col items-center">
        <h1 class="h1-book-stu">¡Vaya Parece que no tienes agregado ningun libro!</h1>
        <div class=" min-h-[400px] min-w-[400px] p-4 flex flex-col justify-center items-center rounded border-l-4 border-blue-500  shadow-lg img-book-student ">
            <h1 class="bg-gradient-to-r from-teal-500  to-blue-500 inline-block text-transparent bg-clip-text text-4xl mb-6">Agregar Libro</h1>
            <a href="/añadir.libros" class=" hover:scale-[1.02] duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 28 28"><path fill="currentColor" d="M4.5 5.75A3.25 3.25 0 0 1 7.75 2.5h12.5a3.25 3.25 0 0 1 3.25 3.25v7.874A7.5 7.5 0 0 0 13.27 22.5H6.018c.121.848.85 1.5 1.732 1.5h6.115a7.522 7.522 0 0 0 1.045 1.5H7.75a3.25 3.25 0 0 1-3.25-3.25zM8 7.25v1c0 .69.56 1.25 1.25 1.25h9.5c.69 0 1.25-.56 1.25-1.25v-1C20 6.56 19.44 6 18.75 6h-9.5C8.56 6 8 6.56 8 7.25M27 20.5a6.5 6.5 0 1 1-13 0a6.5 6.5 0 0 1 13 0m-6-4a.5.5 0 0 0-1 0V20h-3.5a.5.5 0 0 0 0 1H20v3.5a.5.5 0 0 0 1 0V21h3.5a.5.5 0 0 0 0-1H21z"/></svg>        
            </a>
            
        </div>
        
    </div>
    @endforelse
</main>
    
@endsection