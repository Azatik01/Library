@extends('layouts.admin')
@section('content')
    <div class="text-center">
        <h1 class="text" style="display: inline-block">Список авторов</h1>
        <div class="mt-3 mx-3" style="display: inline-block">
            <button type="submit" class="btn btn-outline-primary">
                <a href="{{route('admin.authors.create')}}">
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
                    <th scope="col">Имя</th>
                    <th scope="col">Фамилия</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($authors as $author)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$author->first_name}}</td>
                        <td>{{$author->last_name}}</td>
                        <td>
                            <button class="btn btn-warning" style="display: inline-block">
                                <a href="{{route('admin.authors.edit', ['author' => $author])}}">
                                    Изменить
                                </a>
                            </button>
                            <form action="{{route('admin.authors.destroy', ['author' => $author])}}" method="post" style="display: inline-block">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" style="display: inline-block">
                                    Удалить
                                </button>
                            </form>
                            <button class="btn btn-success" style="display: inline-block">
                                <a href="{{route('admin.authors.show', ['author' => $author])}}">
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

