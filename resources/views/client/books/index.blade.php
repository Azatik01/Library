@extends('layouts.client')
@section('content')
    <h1 class="text-center">Книги</h1>
    <div class="container overflow-hidden text-center mt-5">
        @foreach($books as $book)
            <div class="card mb-5 mx-3" style="width: 18rem; display: inline-block">
                <div class="card-body">
                    @if(!is_null($book->picture))
                        <img class="card-img-top" src="{{asset('storage/' . $book->picture)}}"
                             alt="{{$book->picture}}">
                    @else
                        <h2>Фото не загружено</h2>
                    @endif
                    <h1 class="text-start ">
                        <a href="{{route('books.show', ['book'=> $book])}}">
                            {{$book->name}}
                        </a>
                    </h1>
                </div>
            </div>
        @endforeach
    </div>
@endsection
