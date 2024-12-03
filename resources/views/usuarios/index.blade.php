@extends('layout')
@section('titulo', "Lista de Usuarios")
@section('contenido')
<h1>Lista de usuarios</h1>
@isset($lista_usuarios)
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
                    <a href="{{ route('usuario.edit', $usuario) }}">
                        Editar
                    </a>
                    |
                    <a href="{{ route('usuario.destroy', $usuario) }}"
                        onclick="return confirm('¿Está seguro de eliminar este usuario?')">
                        Eliminar
                    </a>
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
