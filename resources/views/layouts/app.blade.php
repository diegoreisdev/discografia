<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Tião Carreiro e Pardinho</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>

<body>
    <div class="container ">
        <header class="d-flex align-items-center justify-content-between p-4 bg-white">
            <a href="{{ route('discografia.index')}}"><img src="{{url('images/logo.png')}}" alt="Tião Carreiro"></a>
            <h1>Discografia</h1>
        </header>
        @yield('content')
    </div>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>

</html>