@extends('layouts.app')
@section('content')
    <div class="container pt-5">
        <h3><a href="{{route('authors.index')}}">Главная ></a> {{$author->first_name}} {{$author->last_name}}</h3>
        <h2 class="text-warning">{{$author->first_name}} {{$author->last_name}}</h2>
        <div class="card mb-3">
            @if(!is_null($author->picture))
                <img class="card-img-top" style="width: 350px; height: 350px"
                     src="{{asset('storage/' . $author->picture)}}"
                     alt="{{$author->picture}}">
            @else
                <h4>Нет фотографии</h4>
            @endif
            <div class="card-body">
                <h4 class="card-text">{{$author->description}}</h4>
            </div>
        </div>
    </div>

    <div class="container pt-5">
        <h3>
            Книги автора {{$author->first_name}} {{$author->last_name}}
        </h3>
        @foreach($array_books as $book)
            <div class="card mx-5 mt-3" style="width: 18rem; display: inline-block">
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
                        <a href="{{route('authors.show', ['author' => $author])}}">
                            {{$author->first_name}} {{$author->last_name}}
                        </a>
                    </h5>
                    <h5 class="card-title">
                        Цена: {{$book->price}} сом
                    </h5>
                </div>
            </div>
        @endforeach
    </div>


@endsection
