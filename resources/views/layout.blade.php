<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>@yield('titulo', "valor por defecto")</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
         nav li {
            display: inline-block;
            margin-right: 10px;
        }

    </style>
</head>
<body>
    @include("partials.nav")
    @include('partials/session-status')
    @auth
        {{ auth()->user() }}
    @endauth
    @yield('contenido')

</body>
</html>
