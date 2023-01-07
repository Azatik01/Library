@extends('layouts.admin')
@section('content')
    <div class="text-center">
        <h1 class="text" style="display: inline-block">Список книг</h1>
        <div class="mt-3 mx-3" style="display: inline-block">
            <button type="submit" class="btn btn-outline-primary">
                <a href="{{route('admin.books.create')}}">
                    Добавить
                </a>
            </button>
        </div>
    </div>
    <div class="container">
        <div class="row mt-5 pb-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Название книги</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Жанр</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$book->name}}</td>
                        <td>{{$book->author->first_name}} {{$book->author->last_name}}</td>
                        <td>
                            @foreach($book->genres as $genre)
                                {{$genre->name }}
                            @endforeach
                        </td>
                        <td>{{$book->price}} сом</td>
                        <td>
                            <button class="btn btn-warning" style="display: inline-block">
                                <a href="{{route('admin.books.edit', ['book' => $book])}}">
                                    Изменить
                                </a>
                            </button>
                            <form action="{{route('admin.books.destroy', ['book' => $book])}}" method="post"
                                  style="display: inline-block">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" style="display: inline-block">
                                    Удалить
                                </button>
                            </form>
                            <button class="btn btn-success" style="display: inline-block">
                                <a href="{{route('admin.books.show', ['book' => $book])}}">
                                    Просмотреть
                                </a>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

