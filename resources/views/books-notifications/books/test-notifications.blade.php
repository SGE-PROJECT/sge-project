@extends('layouts.panel')

@section('titulo')
    Notificaciones
@endsection

@section('contenido')
<div class=" container">
    <form action="{{route('sendNotification')}}" method="POST">
        @csrf
        <h1>Notificaciones</h1>

        <label for="data">Agrega la info que se guardara en el  mensaje</label>
        <input type="text" id="data" name="data">
        <button type="submit" class=" border-gray-200 border-[1px] bg-teal-500 text-white rounded p-1 ">Enviar Notification</button>
        
    </form>
</div>

@endsection