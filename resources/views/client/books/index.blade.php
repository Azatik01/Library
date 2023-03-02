@extends('layouts.app')
@section('content')
    <h1 class="text-center">Книги</h1>
    <div class="container">

    <div class="row row-cols-1 row-cols-md-4 g-2 pt-5 text-center">
        @foreach($books as $book)
            <div class="col">
                <div class="card">
                    <h4 class="card-title">{{$book->name}}</h4>
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <a href="{{route('books.show', ['book' => $book])}}">
                                        <img src="{{asset('storage/' . $book->picture)}}"
                                             style="width: 250px; height: 250px">
                                    </a>
                                </div>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
    </div>
@endsection
