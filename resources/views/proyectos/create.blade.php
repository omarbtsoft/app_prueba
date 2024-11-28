@extends('layout')
@section('titulo', "Crear Proyecto")
@section('contenido')
<h1>Crear un nuevo proyecto... </h1>

@include('partials.validacion-errors')|


<form  class="formulario max-w-sm mx-auto" style="width:500px" action="{{ route('proyect.store') }}" method="post"  enctype="multipart/form-data">
  @include('proyectos._form', ['BtnText'=>'Nuevo Proyecto'])
</form>



<a href="{{  route('proyect.index') }}" class="btnOk focus:outline-none text-white bg-blue-400 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-blue-900 ">Listar Proyectos</a>
@endsection
