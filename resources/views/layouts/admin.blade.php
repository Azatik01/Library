<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Book store</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
</head>
<body>
@if (session('message'))
    <div class="alert alert-primary" role="alert">
        {{session('message')}}
    </div>
@endif
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('admin.genres.index')}}">Раритет</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.books.index')}}">Книги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.authors.index')}}">Авторы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.genres.index')}}">Жанры</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')
</body>
</html>
