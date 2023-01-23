<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book store</title>
    @vite(['resources/js/app.js'])
</head>
<body>
<div class="container text-center mt-5 text-success">
    <h1>Книжный магазин "Раритет"</h1>
</div>
@yield('content')
</body>
</html>
