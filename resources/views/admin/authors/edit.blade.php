@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center pb-3">Изменить автора</h1>
        <form action="{{ route('admin.authors.update', ['author' => $author])}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" class="form-control" name="first_name" value="{{$author->first_name}}">
                @error('first_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" class="form-control" name="last_name" value="{{$author->last_name}}">
                @error('last_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="last_name">Описание</label>
                <textarea class="form-control" name="description">{{$author->description}}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <div class="custom-file ">
                    <img src="{{asset('/storage/' . $author->picture)}}" alt="{{$author->picture}}" style="width:50px;height:50px;">
                    <label for="picture">Изменить изображение</label>
                    <input type="file" class="custom-file-input" id="customFile" name="picture">
                    @error('picture')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button  type="submit" class="btn btn-primary mt-3">Сохранить</button>
        </form>
        <button  type="submit" class="btn btn-warning mt-3">
            <a href="{{route('admin.authors.index')}}">Назад</a>
        </button>
    </div>
@endsection
