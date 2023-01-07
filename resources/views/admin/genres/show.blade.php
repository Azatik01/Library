@extends('layouts.admin')
@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card text-bg-dark mb-3" style="width: 25rem;">
                @if(!is_null($genre->picture))
                    <img class="card-img-top" src="{{asset('storage/' . $genre->picture)}}"
                         alt="{{$genre->picture}}">
                @else
                    <h2>Фото не загружено</h2>
                @endif
            </div>
            <div class="container">
                <h3>
                    Книги в жанре: {{$genre->name}}
                </h3>
                @foreach($array_books as $book)
                    <div class="card-body">
                        <h5 class="card-title">{{$book->name}}</h5>

                    </div>
                @endforeach
            </div>
            <button class="btn btn-warning">
                <a href="{{route('admin.genres.index')}}">Назад</a>
            </button>
        </div>
    </div>
@endsection
