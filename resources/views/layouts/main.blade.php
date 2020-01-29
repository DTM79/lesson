<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"class="h-100">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
    </head>
    <body class="d-flex flex-column h-100">
    @include('layouts.navbar')
    <div class="mt-5">
        @yield('content')
    </div>
       @include('layouts.footer')
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
        <script src="/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
