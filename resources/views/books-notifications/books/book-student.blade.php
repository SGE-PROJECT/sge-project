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
  display: flex;
  flex-direction: column;
  isolation: isolate;
  position: relative;
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  z-index: 1;
  background-color: white;
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
/*   color: #fff;
  box-shadow: 0px 0px 25px #222;
  backdrop-filter: contrast(47%)  brightness(80%); */
}

.notification:hover .notititle{
    text-shadow: 2px 2px 5px 2px rgba(0, 0, 0, 0.808);
}



.notification:hover:after {
  transform: translateX(0.15rem)
}

.notititle {
  padding: 0.65rem 0.25rem 0.4rem 1.25rem;
  font-weight: 500;
  font-size: 2.5rem;
  transition: transform 300ms ease;
  z-index: 5;
/*   text-shadow: 2px 2px 8px rgba(0,0,0,0.7); */
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
  font-size: 1rem;
  background-image: url('https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?q=80&w=2574&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}



.notiglow,
.notiborderglow {
  position: absolute;
  width: 20rem;
  height: 25rem;
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
.grid-book{
  display: grid;
  grid-template-columns:  1fr;

}

@media (min-width: 895px) {
    .grid-book {
        grid-template-columns: 340px 1fr;
    }
}

@media (min-width: 1224px) {
    .title-book-student {
        margin-top: -3rem/* -48px */;
    }
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
    
    <div class=" mx-10 h-auto img-book-student flex-wrap   rounded grid grid-cols-1 items-center">

        <h1 class="  rounded-t w-full  bg-gradient-to-r from-[#00ab84] to-[#00e7b1] h1-book-student  font-semibold flex items-center justify-center  gap-2 text-white py-2 px-4 "><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" ><path fill="currentColor" d="M6.75 22q-1.125 0-1.937-.763T4 19.35V5.4q0-.95.588-1.7t1.537-.95L16 .8v16l-9.475 1.9q-.225.05-.375.238T6 19.35q0 .275.225.463T6.75 20H18V4h2v18zM7 16.575l2-.4V4.225l-2 .4z"/></svg> Libro<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="currentColor" d="M6.75 22q-1.125 0-1.937-.763T4 19.35V5.4q0-.95.588-1.7t1.537-.95L16 .8v16l-9.475 1.9q-.225.05-.375.238T6 19.35q0 .275.225.463T6.75 20H18V4h2v18zM7 16.575l2-.4V4.225l-2 .4z"/></svg></h1>
        <div class=" bg-white p-2  h-full   grid grid-cols-1 items-start justify-center py-5  w-full  ">   
            <div class=" grid-book   px-3    w-full   justify-center items-center content-start  ">
              <div class="   h-full flex justify-center items-center">

                
                <div class=" book xl:min-h-[480px]   xl:min-w-[260px] max-w-[260px]  duration-300">
                  <div class=" inf-book mt-3 flex flex-col pl-12 max-h-[320px] min-h-[300px] min-w-[225px] overflow-auto items-center">
                    
                    <h1 class="subtitle-book font-semibold bg-gradient-to-r from-teal-500   to-teal-500 inline-block text-transparent bg-clip-text">Descripción:</h1>
                    <p class=" font-normal text-slate-700  ">{{$bk->description}}</p>
                  </div>
                  <div class="cover">
                    <img  class="img-book-student  h-full w-full rounded"  src="{{$bk->image_book}}" alt="Imagen del libro">
                  </div>
                </div>
                
              </div>
                  

                <div class=" mt-0 ">
            <h1 id="title-book-student" class="   title-book-student  text-clip mb-4 font-bold  text-balance text-center bg-gradient-to-r from-slate-600  to-slate-500 inline-block text-transparent bg-clip-text">{{$bk->title}}</h1>
<div class=" grid grid-cols-2 gap-2 justify-items-center items-center  text-center">


                    <div class=" ">
                        @if ($bookCollaborative->count()>1)     
                        <h1 class="bg-gradient-to-r from-teal-500 font-semibold  to-teal-500 inline-block text-transparent bg-clip-text subtitle-book mb-1">Colaboradores:</h1>
                        @foreach ($bookCollaborative as $bkcol )
                        <span class=" flex items-center mb-2 gap-1"><svg class=" text-slate-400" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="m14.475 12l-7.35-7.35q-.375-.375-.363-.888t.388-.887q.375-.375.888-.375t.887.375l7.675 7.7q.3.3.45.675t.15.75q0 .375-.15.75t-.45.675l-7.7 7.7q-.375.375-.875.363T7.15 21.1q-.375-.375-.375-.888t.375-.887z"/></svg>
    
                            <p class=" font-medium  bg-blue-400 text-white rounded-full p-[3px] px-2  ">{{$bkcol->name}}</p>   
                        </span>
                        @endforeach
                        @else
                        <h1 class="subtitle-book font-semibold bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Colaborador:</h1>
                        @foreach ($bookCollaborative as $bkcol )
                        <p class=" font-medium text-slate-700  ">{{$bkcol->name}}</p>   
                        @endforeach
                        @endif
                    </div>
                 
                    <div class="">

                        <h1 class="subtitle-book font-semibold bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Autor:</h1>
                        <p class=" font-medium text-slate-700 ">{{$bk->author}}</p>
                    </div>
                    <div class=" mt-3 flex flex-col">

                        <h1 class="subtitle-book font-semibold bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Precio:</h1>
                        <p class=" font-medium text-slate-700 ">${{$bk->price}}</p>
                    </div>
                    <div class=" mt-3 flex flex-col">

                        <h1 class="subtitle-book  bg-gradient-to-r font-semibold from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Editorial:</h1>
                        <p class=" font-medium text-slate-700 ">{{$bk->editorial}}</p>
                    </div>
                    @if ($bk->state===1)
                      
                    <div class="  flex flex-col">

                      <h1 class="subtitle-book font-semibold bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Estado:</h1>
                      <p class=" font-medium text-slate-700 ">Finalizado</p>
                  </div>
                    @else
                        
                    <div class="  flex flex-col">

                      <h1 class="subtitle-book font-semibold bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Estado:</h1>
                      <p class=" font-medium text-slate-700 ">En proceso</p>
                  </div>
                      
                    @endif
                    @if ($bookComplete)
           {{--          <div class=" mt-3 flex flex-col">

                        <h1 class="subtitle-book font-medium bg-gradient-to-r from-teal-500  to-teal-500 inline-block text-transparent bg-clip-text">Situación:</h1>
                        <p class=" font-medium text-slate-700 "></p>
                    </div>  --}}
                    @else
                    <div class="  flex flex-col">
                        <p class=" font-semibold text-orange-600 ">Proyecto no Confirmado</p>
                    </div>         
                    @endif
                 
                  </div>

                </div>
            </div>
        </div>
    </div>

    @empty
    <div class=" flex flex-col items-center  w-full ">
        <div class="   mx-10 ">
            <div class=" rounded-lg">
              <div class=" rounded-t-lg h-[35px] w-full z-40 bg-gradient-to-r from-[#00ab84] to-[#00e7b1]">
              </div>
              <div class=" grid grid-cols-2 bg-white rounded-b-lg">
                  <div class="notibody  rounded-bl-lg h-auto  sm:h-60"></div>
                <div class=" grid grid-cols-1 gap-0 rounded-br-lg">
                <div class=" text-slate-700  text-balance text-center text-3xl pt-2  ">¡Vaya Parece que no tienes agregado ningun libro!
                  </div>
                  <div class=" text-center text-balance h-fit flex justify-center items-center">
                    <span class=" ">Puedes agregar uno aqui</span>
                  </div>
                  <div class=" h-fit text-center text-balance flex justify-center items-center">
                    <span class=" text-xl ">⬇</span>
                  </div>
                  @if ($permiso)
                  <dv class=" text-center text-balance flex justify-center items-center h-fit" >
                    <a class=" rounded bg-teal-500 text-white p-2 font-bold" href="{{route('añadir.libros')}}">Agregar</a>             
                  </dv>
                  @else
                  <div class=" text-center text-balance flex justify-center items-center h-fit  ">
                    <span class="no-click rounded bg-teal-500 text-white p-2 font-bold">Agregar</span>                
                  </div>
                @endif
              </div>

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