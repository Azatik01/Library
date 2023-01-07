@extends('layouts.client')
@section('content')
    <div class="container">
        <h2> Автор:
            @foreach($authors as $author)
                <a href="{{route('authors.show', ['author' => $author])}}">
                    @if($author->id == $book->author_id)
                        {{$book->author->first_name}} {{$book->author->last_name}}
                    @endif
                </a>
            @endforeach
        </h2>
        <h2> Наименование книги:
            {{$book->name}}</h2>
        @if(!is_null($book->picture))
            <img
                 src="{{asset('storage/' . $book->picture)}}"
                 alt="{{$book->picture}}">
        @else
            <h4>Нет фотографии</h4>
        @endif
        <h3 class="card_title">Цена: {{$book->price}} сом</h3>
        <h4 class="card-title">Описание: {{$book->description}}</h4>

    </div>
@endsection
