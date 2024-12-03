@extends('layout')
@section('titulo', "Editar Usuario")

@section('contenido')


<h1> Editar de Usuario </h1>
<form class="max-w-sm mx-auto" method="POST" action="{{ route('usuario.update', $usuario ) }}">
    @method('PUT')

    @include('usuarios.form', ["btnText"=>"Editar Usuario"]);

</form>

@endsection
