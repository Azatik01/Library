@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        <h1 class="text-center pb-3">Добавить жанр</h1>
        <form action="{{ route('admin.books.update', ['book' => $book])}}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">Наименование</label>
                <input type="text" class="form-control" name="name" value="{{$book->name}}">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <div class="custom-file ">
                    <img src="{{asset('/storage/' . $book->picture)}}" alt="{{$book->picture}}" style="width:50px;height:50px;">
                    <label class="custom-file-label form-control" for="customFile">Изменить изображение</label>
                    <input type="file" class="custom-file-input" id="customFile" name="picture">
                    @error('picture')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="last_name">Описание</label>
                <textarea class="form-control" name="description">{{$book->description}}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="author_id">Автор</label>
                <select name="author_id" class="custom-select">
                    @foreach($authors as $author)
                        <option value="{{$author->id}}">{{$author->first_name}} {{$author->last_name}}</option>
                    @endforeach
                </select>
                @error('author_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="author_id">Жанр</label>
                @foreach($genres as $genre)
                    <div>
                        <input type="checkbox" id="scales" name="genre_id[]" checked value="{{$genre->id}}">
                        <label for="scales">{{$genre->name}}</label>
                    </div>
                @endforeach
                @error('genre_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Цена</label>
                <input type="number" class="form-control" name="price" value="{{$book->price}}">
                @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button  type="submit" class="btn btn-primary mt-3">Сохранить</button>
        </form>
        <button  type="submit" class="btn btn-warning mt-3">
            <a href="{{route('admin.books.index')}}">Назад</a>
        </button>
    </div>
@endsection
