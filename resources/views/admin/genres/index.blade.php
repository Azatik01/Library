@extends('layouts.admin')
@section('content')
        <div class="text-center">
            <h1 class="text" style="display: inline-block">Список жанров</h1>
            <div class="mt-3 mx-3" style="display: inline-block">
                <button type="submit" class="btn btn-outline-primary">
                    <a href="{{route('admin.genres.create')}}">
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
                    <th scope="col">Наименование</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($genres as $genre)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$genre->name}}</td>
                        <td>{{$genre->description}}</td>
                        <td>
                            <button class="btn btn-warning" style="display: inline-block">
                                <a href="{{route('admin.genres.edit', ['genre' => $genre])}}">
                                    Изменить
                                </a>
                            </button>
                            <form action="{{route('admin.genres.destroy', ['genre' => $genre])}}" method="post" style="display: inline-block">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" style="display: inline-block">
                                Удалить
                                </button>
                            </form>
                            <button class="btn btn-success" style="display: inline-block">
                                <a href="{{route('admin.genres.show', ['genre' => $genre])}}">
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
