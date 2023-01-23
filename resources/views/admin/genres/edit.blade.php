@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center pb-3">Изменить жанр</h1>
        <form action="{{ route('admin.genres.update', ['genre' => $genre]) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">Наименование</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$genre->name}}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <img src="{{asset('/storage/' . $genre->picture)}}" alt="{{$genre->picture}}" style="width:50px;height:50px;"><br/><br>
                <label for="picture">Изменить изображение</label>
                <input type="file" class="custom-file-input" id="customFile" name="picture" value="{{$genre->picture}}">
                @error('picture')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" id="description" name="description">{{$genre->description}}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection
