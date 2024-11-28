@extends('layout')

@section('titulo', 'Lista de proyectos ')
@section('contenido')
    <h1>Lista de proyectos </h1>

    @isset($categoria)
        <div style="background: rgb(253, 253, 253); margin:2px">

            <h2 class="mb-4 text-4xl leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{ $categoria->nombre }}</h2>
            <a href="{{ route('proyect.index') }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Volver</a>

        </div>
    @endisset

    @isset($listaProyecto1)
        <br />


        @can('crear-proyecto')
        <h2>
            <a href="{{ route('proyect.create') }}"
             class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear
             Un nuevo proyecto</a>
        </h2>
        @endcan

{{--
      @can('create', $newProyecto)
        <h2>
            <a href="{{ route('proyect.create') }}"
             class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear
             Un nuevo proyecto</a>
        </h2>
        @endcan --}}




        <br />
        <div class="container_cards">
            @forelse ($listaProyecto1 as $item)
                {{-- <li>
            <h2> {{ $item->titulo }}</h2>
            <span>{{ $item->descripcion }}</span>
            <p>{{ $item->tiempo_relativo  }}</p>
            <a href="{{ route('proyect.show', $item->slug ) }}">Mas informacion  </a>
            </li>
        --}}
                <div
                    class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $item->titulo }}</h5>
                    </a>
                    @if ($item->image)
                        <img src="/storage/{{ $item->image }}" alt="{{ $item->titulo }}">
                    @endif

                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item->descripcion }}</p>

                    <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">{{ $item->tiempo_relativo }}</span>
                    <br />


                    <a href="{{ route('proyect.show', $item->slug) }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Mas info
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                    @isset($item->categoria->nombre)
                        <span
                            class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">

                            <a href="{{ route('categoria.show', $item->categoria) }}">
                                {{ $item->categoria->nombre }}
                            </a>

                        </span>
                    @endisset

                </div>
                <br />

            @empty
                <p>No hay datos que mostrar </p>
            @endforelse
        </div>
        </br>
        {{ $listaProyecto1->links() }}
    @else
        <p>No hay la variable</p>
    @endisset
    <hr>
    {{--
    @foreach ($listaProyecto1 as $key => $value)
        <li>
            <pre> {{  var_dump($loop)   }}</pre>
        </li>
    @endforeach
 --}}

@endsection
