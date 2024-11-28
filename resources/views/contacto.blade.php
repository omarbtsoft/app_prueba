@extends('layout')
@section('titulo', "Contacto page")
@section('contenido')


<h1>Fomulario de contacto</h1>


@php
  \Log::info("message");
  \Log::info(session('status'));
@endphp


<form action="{{ route("contactos_post") }}" method="POST">
    @csrf
    <label > Nombre: <input type="text" name="nombre" id="" placeholder="Nombre ... " value="{{ old("nombre") }}"></label> </br>

    {!! $errors->first("nombre", "<p>:message</p>")  !!}

    <label > Email: <input type="text" name="email" id="" placeholder="Email ..." value="{{ old("email") }}"></label></br>
    {!! $errors->first("email", "<p>:message</p>")  !!}

    <label > Asunto: <input type="text" name="asunto" id="" placeholder="Asunto .." value="Esto es mi asunto"></label></br>
    <textarea name="contenido" id="" cols="30" rows="10" placeholder="Mensaje ... "> Hola Mundo esto es mi text area </textarea></br>
    <input type="submit" value="Enviar">
</form>


@endsection
