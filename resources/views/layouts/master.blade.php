<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <title></title>

</head>
<body>

    @include('header')

    <main>
        @yield('content')
    </main>

    <footer>
        @include('footer')
    </footer>
</body>
</html>