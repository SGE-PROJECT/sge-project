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

    /* section for student-book */

.book {
    position: relative;
    border-radius: 10px;
    background-color: whitesmoke;
    box-shadow: 1px 1px 12px #9c9c9b;
    -webkit-transform: preserve-3d;
    -ms-transform: preserve-3d;
    transform: preserve-3d;
    -webkit-perspective: 2000px;
    perspective: 2000px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    color: #000;
  }
  
  .cover {
    top: 0;
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 10px;
    cursor: pointer;
    -webkit-transition: all 0.5s;
    transition: all 0.5s;
    -webkit-transform-origin: 0;
    -ms-transform-origin: 0;
    transform-origin: 0;
    box-shadow: 0px 0px 8px 1px #d8e9fd;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
  }
 
  .book:hover .cover {
    -webkit-transition: all 0.5s;
    transition: all 0.5s;
    -webkit-transform: rotatey(-80deg);
    -ms-transform: rotatey(-80deg);
    transform: rotatey(-80deg);
  }

  /* Estilizar la barra de desplazamiento */
.inf-book::-webkit-scrollbar {
  width: 4px; /* Grosor de la barra de desplazamiento */

}
.inf-book{
    overscroll-behavior-y:none;
}

.inf-book::-webkit-scrollbar-track {
  background: #F5F5F5; /* Color de fondo de la pista */
  padding: 0%;
  margin: 0%;
  border-radius: 4px;
}

.inf-book::-webkit-scrollbar-thumb {
    --tw-bg-opacity: 1;
    background-color: rgb(20 184 166 / var(--tw-bg-opacity));
   /* Color de la barra de desplazamiento */
  border-radius: 4px; /* Bordes redondeados */
}

.notification {
    margin-top:100px; 
  display: flex;
  flex-direction: column;
  isolation: isolate;
  position: relative;
  background-image: url('https://images.unsplash.com/photo-1513001900722-370f803f498d?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8Ym9va3xlbnwwfHwwfHx8MA%3D%3D');
  background-size: cover;
  z-index: 1;
  background-position: center;
  background-repeat: no-repeat;
  border-radius: 1rem;
  overflow: hidden;
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  font-size: 16px;
  --gradient: linear-gradient(to bottom, #ffffff, #969998, #d6d6d6);
  --color: #32a6ff
}
.wrap{
  /* background-color: #fff; */
  height: 100%;
  width: 100%;
  text-align: center;
  color: #fff;
  box-shadow: 0px 0px 25px #222;
  backdrop-filter: contrast(47%)  brightness(80%);
}

.notification:hover .notititle{
    text-shadow: 2px 2px 5px 2px rgba(0, 0, 0, 0.808);
}


.notification:after {
  position: absolute;
  content: "";
  width: 0.25rem;
  inset: 0.65rem auto 0.65rem 0.5rem;
  border-radius: 0.125rem;
  background: var(--gradient);
  transition: transform 300ms ease;
  z-index: 4;
}

.notification:hover:after {
  transform: translateX(0.15rem)
}

.notititle {
  color: white; 
  padding: 0.65rem 0.25rem 0.4rem 1.25rem;
  font-weight: 500;
  font-size: 2.5rem;
  transition: transform 300ms ease;
  z-index: 5;
  text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
}

.notification:hover .notititle {
  transform: translateX(0.15rem)
}

.notibody {
    color: rgb(250, 250, 255);
  text-shadow: 2px 2px 8px rgba(0,0,0,0.7);
  padding: 0 1.25rem;
  transition: transform 300ms ease;
  z-index: 5;
}

.notification:hover .notibody {
  transform: translateX(0.25rem)
}

.notiglow,
.notiborderglow {
  position: absolute;
  width: 20rem;
  height: 20rem;
  transform: translate(-50%, -50%);
  background: radial-gradient(circle closest-side at center, white, transparent);
  opacity: 0;
  transition: opacity 300ms ease;
}

.notiglow {
  z-index: 3;
}

.notiborderglow {
  z-index: 1;
}

.notification:hover .notiglow {
  opacity: 0.1
}

.notification:hover .notiborderglow {
  opacity: 0.1
}

.note {
  color: var(--color);
  position: fixed;
  top: 80%;
  left: 50%;
  transform: translateX(-50%);
  text-align: center;
  font-size: 0.9rem;
  width: 75%;
}

/* .notification .wrap .no-click {
   z-index: 10;
  cursor: not-allowed;
  pointer-events: none;
}
 */
</style>
<link rel="stylesheet" href="../../../../resources/css/books-notifications/books/student-book.css">
<main class="flex justify-evenly pt-10 rounded font-poppins">
    @forelse ($book as $bk )
    
    <div class=" w-[700px] h-auto img-book-student flex-wrap  rounded flex flex-col items-center pb-4">

        <h1 class="  rounded-t w-full bg-gradient-to-r from-[#00ab84] to-[#00e7b1] h1-book-student  font-semibold flex items-center justify-center  mb-2 gap-2 text-neutral-200/90 py-2 px-4 "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" ><path fill="currentColor" d="M6.75 22q-1.125 0-1.937-.763T4 19.35V5.4q0-.95.588-1.7t1.537-.95L16 .8v16l-9.475 1.9q-.225.05-.375.238T6 19.35q0 .275.225.463T6.75 20H18V4h2v18zM7 16.575l2-.4V4.225l-2 .4z"/></svg> Libro<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M6.75 22q-1.125 0-1.937-.763T4 19.35V5.4q0-.95.588-1.7t1.537-.95L16 .8v16l-9.475 1.9q-.225.05-.375.238T6 19.35q0 .275.225.463T6.75 20H18V4h2v18zM7 16.575l2-.4V4.225l-2 .4z"/></svg></h1>
        <div class=" bg-gray-200 p-2   flex flex-col items-center justify-center py-5  w-full  rounded">   
            <h1 id="title-book-student" class="title-book-student text-clip mb-4 font-bold  text-balance text-center bg-gradient-to-r from-slate-600  to-slate-500 inline-block text-transparent bg-clip-text">{{$bk->title}}</h1>
            <div class="   px-3 grid grid-cols-1 md:grid md:grid-cols-2  w-full   justify-center items-center content-center  ">
                <div class=" book xl:min-h-[300px]  xl:min-w-[260px] max-w-[260px] hover:scale-[1.02] duration-300">
                    <div class=" inf-book mt-3 flex flex-col pl-12 max-h-[260px] min-h-[260px] overflow-auto items-center">

                        <h1 class="subtitle-book font-medium bg-gradient-to-r from-teal-500   to-teal-500 inline-block text-transparent bg-clip-text">Descripción:</h1>
                        <p class=" font-normal text-slate-700  ">{{$bk->description}}</p>
                    </div>
                    <div class="cover">
                        <img  class="img-book-student  h-full w-full rounded"  src="{{$bk->image_book}}" alt="Imagen del libro">
                    </div>
                </div>
                <div class=" gap-1">
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

                        <h1 class="subtitle-book font-medium bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Autor:</h1>
                        <p class=" font-medium text-slate-700 ">{{$bk->author}}</p>
                    </div>
                    <div class=" mt-3 flex flex-col">

                        <h1 class="subtitle-book font-medium bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Precio:</h1>
                        <p class=" font-medium text-slate-700 ">{{$bk->price}}</p>
                    </div>
                    <div class=" mt-3 flex flex-col">

                        <h1 class="subtitle-book font-medium bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Editorial:</h1>
                        <p class=" font-medium text-slate-700 ">{{$bk->editorial}}</p>
                    </div>
                    @if ($bookComplete)
                    <div class=" mt-3 flex flex-col">

                        <h1 class="subtitle-book font-medium bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Estado:</h1>
                        <p class=" font-medium text-slate-700 ">Completado</p>
                    </div> 
                    @else
                    <div class=" mt-3 flex flex-col">

                        <h1 class="subtitle-book font-medium bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Estado:</h1>
                        <p class=" font-medium text-slate-700 ">Pendiente</p>
                    </div>         
                    @endif

                </div>
            </div>
        </div>
    </div>

    @empty
    <div class=" flex flex-col items-center">
        <div class="notification relative min-h-[280px] min-w-[440px] max-w-[490px]  md:h-[300px] md:w-[490px]">
            <div class=" wrap">
                <div class=" h-[35px] w-full z-40 bg-gradient-to-r from-[#00ab84] to-[#00e7b1]">

                </div>

                <div class="notiglow"></div>
                <div class="notiborderglow"></div>
                <div class="notititle">¡Vaya Parece que no tienes agregado ningun libro!</div>
                <div class="notibody">Puedes agregar uno aqui</div>
                <span>⬇</span><br>
                @if ($permiso)
                <a href="{{route('añadir.libros')}}">Agregar</a>             
                @else
                <span class="no-click ">Agregar</span>                
                @endif
                <div class=" absolute">
                    <img src="https://unsplash.com/es/fotos/candelabro-con-marco-de-madera-marron-en-la-parte-superior-de-los-libros-ip9R11FMbV8" alt="">
                </div>
            </div>
          </div>
        
    </div>
    @endforelse
</main>
<script defer>

document.addEventListener('DOMContentLoaded', function () {
  const agregarBtn = document.querySelector('.no-click');
  if (agregarBtn) {
    agregarBtn.addEventListener('mouseover', function() {
      agregarBtn.style.cursor = 'not-allowed';
    });
  }
});
    
</script>
    
@endsection