@if ($errors)
    <h3>Hubo un error en el formulario:</h3> <!-- Muestra los errors en caso de que existan -->
    <ul>
        {{-- @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach --}}
    </ul>
@else
    <p>No hay error </p>
@endif
