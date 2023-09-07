<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>@yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
     <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
</head>
@include('app.layouts._partials.navbar')

<body>
    @yield('conteudo')
</body>


</html>
