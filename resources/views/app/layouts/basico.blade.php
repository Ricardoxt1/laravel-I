<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>@yield('titulo')</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
</head>
@include('app.layouts._partials.navbar')
<body>
    @yield('conteudo')
</body>
@include('app.layouts._partials.footer')
</html>
