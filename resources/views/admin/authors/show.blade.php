@extends('layouts.admin')
@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card text-bg-dark mb-3" style="width: 25rem;">
                @if(!is_null($author->picture))
                    <img class="card-img-top" src="{{asset('storage/' . $author->picture)}}" alt="{{$author->picture}}">
                @else
                    <h2>Фото не загружено</h2>
                @endif
                <div class="card-body" >
                    <h5 class="card-title">Имя: {{$author->first_name}}</h5>
                    <h5 class="card-title">Фамилия: {{$author->last_name}}</h5>
                    <h5 class="card-title">Описание: {{$author->description}}</h5>
                </div>
            </div>
            <button class="btn btn-warning">
                <a href="{{route('admin.authors.index')}}">Назад</a>
            </button>
        </div>

    </div>
@endsection
