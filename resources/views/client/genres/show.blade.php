@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <h3><a href="{{route('genres.index')}}">Главная ></a> {{$genre->name}}</h3>
        <h2 class="text-warning">{{$genre->name}}</h2>
        <div class="card mb-3">
            @if(!is_null($genre->picture))
                <img class="card-img-top" style="width: 350px; height: 350px"
                     src="{{asset('storage/' . $genre->picture)}}"
                     alt="{{$genre->picture}}">
            @else
                <h4>Нет фотографии</h4>
            @endif

            <div class="card-body">
                <h4 class="card-text">{{$genre->description}}</h4>
            </div>
        </div>
    </div>

    <div class="container pt-5">
        <h3>
            Книги в жанре {{$genre->name}}
        </h3>
        @foreach($array_books as $book)
                <div class="card mx-5 mt-5" style="width: 20rem; display: inline-block">
                    <div class="card-body">
                        @if(!is_null($book->picture))
                            <img class="card-img-top" height="300px" src="{{asset('storage/' . $book->picture)}}"
                                 alt="{{$book->picture}}">
                        @else
                            <h2>Фото не загружено</h2>
                        @endif
                        <h5 class="card-title">Название:
                            <a href="{{route('books.show', ['book' => $book])}}">
                                {{$book->name}}
                            </a>
                        </h5>
                        <h5 class="card-title">Автор:
                            @foreach($authors as $author)
                            <a href="{{route('authors.show', ['author' => $author])}}">
                                @if($author->id == $book->author->id)
                                {{$book->author->first_name}} {{$book->author->last_name}}
                                    @endif
                            </a>
                            @endforeach
                        </h5>
                    </div>
                </div>
        @endforeach
    </div>
@endsection
