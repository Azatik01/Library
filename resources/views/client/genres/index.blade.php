@extends('layouts.app')
@section('content')
    <h1 class="text-center">Жанры</h1>
    <div class="container overflow-hidden text-center mt-5">
        @foreach($genres as $genre)
            <div class="card mb-5 mx-3" style="width: 18rem;display: inline-block">
                <div class="card-body">
                    @if(!is_null($genre->picture))
                        <img class="card-img-top" height="300px" src="{{asset('storage/' . $genre->picture)}}"
                             alt="{{$genre->picture}}">
                    @else
                        <h2>Фото не загружено</h2>
                    @endif
                    <h1 class="text-start ">
                        <a href="{{route('genres.show', ['genre'=> $genre])}}">
                            {{$genre->name}}
                        </a>
                    </h1>
                </div>
            </div>
        @endforeach
    </div>
@endsection
