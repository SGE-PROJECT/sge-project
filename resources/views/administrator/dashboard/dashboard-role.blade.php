@extends('layouts.panel')

@section('titulo', 'Dashboard')

@section('contenido')
@vite('resources/css/administrator/dashboard.css')
@vite('resources/js/administrator/graph-general.js')

<div class="p-6 grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
    @include('administrator.graph-anteprojects')
    @include('administrator.graph-projects')
    @include('administrator.graph-users')
</div>

@endsection
