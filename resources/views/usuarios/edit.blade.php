@extends('layout')
@section('titulo', "Editar Usuario")

@section('contenido')


<h1> Editar de Usuario </h1>

@if(session()->has('success'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="font-medium">{{ session('success') }}</span>
    </div>
@endif

<form class="max-w-sm mx-auto" method="POST" action="{{ route('usuario.update', $usuario ) }}">
    @method('PUT')
    @include('usuarios.form', ["btnText"=>"Editar Usuario"]);
</form>

@endsection
