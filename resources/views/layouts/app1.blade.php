<!doctype html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Todos List</title>
        <link rel="stylesheet" href="{{ URL::asset('css/app.css'); }} "/>
    </head>
    <body>
        @include('layouts.navbar')
        @include('layouts.message')
        <div class="container">
            @yield('content')
        </div>
    </body>
    <footer class="text-center">Copyright © 2023</footer>
</html>
