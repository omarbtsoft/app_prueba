@extends('layout')
@section('titulo', "Crear Proyecto")
@section('contenido')
<h1>Crear un nuevo proyecto... </h1>

@include('partials.validacion-errors')
<pre>
  @isset($proyecto)

  @endisset
</pre>

<form class="formulario max-w-sm mx-auto" style="width:500px"  method="POST" action="{{ route('proyect.update', $proyecto) }}"  enctype="multipart/form-data">

    @method('PATCH')
    @include('proyectos._form',['BtnText'=>"Editar Proyecto"])

</form>

<a href="{{  route('proyect.index') }}"  class="btn-link">Listar Proyectos</a>
@endsection
