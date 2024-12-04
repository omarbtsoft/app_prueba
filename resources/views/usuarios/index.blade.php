@extends('layout')
@section('titulo', "Lista de Usuarios")
@section('contenido')
<h1>Lista de usuarios</h1>
@isset($lista_usuarios)
<a  href="{{ route('usuario.create') }}" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-10 mb-10 my-11 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Crear un nuevo usuario</a>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Correo
                </th>
                <th scope="col" class="px-6 py-3">
                    Roles
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha de modificacion
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($lista_usuarios as  $usuario )
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $usuario->email }}
                </th>
                <td class="px-6 py-4">
                 {{ $usuario->name }}
                </td>
                <td class="px-6 py-4">
                    {{ $usuario->role  }}
                </td>
                <td class="px-6 py-4">
                    {{ $usuario->updated_at  }}
                </td>
                <td class="px-6 py-4">
                    @can('update', new App\Models\User)
                    <a href="{{ route('usuario.edit', $usuario) }}">
                        Editar
                    </a>
                    @endcan
                    |
                    @can('delete', new App\Models\User)
                    <form   action="{{ route('usuario.destroy', $usuario) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium  rounded-lg text-sm px-1 py-1 me-0 mb-0 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Eliminar</button>
                    </form>
                    @endcan
            </td>
                </td>

            </tr>
            @empty
            <p>No hay usuarios registrados.</p>
            @endforelse
        </tbody>
    </table>
</div>


@endisset

@endsection
