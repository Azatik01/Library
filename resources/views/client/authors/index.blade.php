@extends('layouts.client')
@section('content')
    <h1 class="text-center">Авторы</h1>
    <div class="container overflow-hidden text-center mt-5">
        @foreach($authors as $author)
            <div class="card mb-5 mx-3" style="width: 18rem; display: inline-block">
                <div class="card-body">
                    @if(!is_null($author->picture))
                        <img class="card-img-top" src="{{asset('storage/' . $author->picture)}}"
                             alt="{{$author->picture}}">
                    @else
                        <h2>Фото не загружено</h2>
                    @endif
                    <h1 class="text-start ">
                        <a href="{{route('authors.show', ['author'=> $author])}}">
                            {{$author->first_name}} {{$author->last_name}}
                        </a>
                    </h1>
                </div>
            </div>
        @endforeach
    </div>
@endsection
