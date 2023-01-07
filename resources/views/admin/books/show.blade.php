@extends('layouts.admin')
@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card text-bg-dark mb-3" style="width: 25rem;">
                @if(!is_null($book->picture))
                    <img class="card-img-top" src="{{asset('storage/' . $book->picture)}}" alt="{{$book->picture}}">
                @else
                    <h2>Фото не загружено</h2>
                @endif
                <div class="card-body">
                    <h5 class="card-title">Наименование: {{$book->name}}</h5>
                    <h5 class="card-title">Описание: {{$book->description}}</h5>
                        <h5 class="card-title">Автор:{{$book->author->first_name}} {{$book->author->last_name}}</h5>
                    <h5>Жанр: </h5>
                    @foreach($book->genres as $genre)
                        <h5 class="card-title">{{$genre->name}}</h5>
                    @endforeach
                    <h5 class="card-title">Цена: {{$book->price}}</h5>
                </div>
            </div>
            <button class="btn btn-warning">
                <a href="{{route('admin.books.index')}}">Назад</a>
            </button>
        </div>
    </div>
@endsection
