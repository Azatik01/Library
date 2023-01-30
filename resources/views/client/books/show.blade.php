@extends('layouts.app')
@section('content')
    <div class="container">
        <h3><a href="{{route('books.index')}}">Главная ></a>
            @foreach($genres as $genre)
                <a href="{{route('genres.show', ['genre' => $genre])}}">
                    @foreach($book->genres as $bg)
                        @if($bg->id == $genre->id)
                            {{$genre->name}} -
                        @endif
                    @endforeach
                </a>
            @endforeach
            >
            {{$book->name}}
        </h3>
        <h2> Автор:
            @foreach($authors as $author)
                <a href="{{route('authors.show', ['author' => $author])}}">
                    @if($author->id == $book->author_id)
                        {{$book->author->first_name}} {{$book->author->last_name}}
                    @endif
                </a>
            @endforeach
        </h2>
        <h2> Наименование книги:
            {{$book->name}}</h2>
        @if(!is_null($book->picture))
            <img
                src="{{asset('storage/' . $book->picture)}}"
                alt="{{$book->picture}}">
        @else
            <h4>Нет фотографии</h4>
        @endif
        <h3 class="card_title">Цена: {{$book->price}} сом</h3>
        <h4 class="card-title">Описание: {{$book->description}}</h4>
    </div>
    <div class="container">
        <br>
        <h3>Комментарии: </h3>
        <div class="row">
            <button class="btn btn-primary" id="fadetoggle">Посмотреть комментарии</button>
            <div class="col-8 scrollit">
                @foreach($book->comments as $comment)
                    <div class="">
                        <div class="media g-mb-30 media-comment">
                            <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                                <div class="g-mb-15">
                                    {{$comment->user->name}}
                                    <h5 class="h5 g-color-gray-dark-v1 mb-0">{{$comment->rating}}</h5>
                                    <span
                                        class="g-color-gray-dark-v4 g-font-size-12">{{$comment->created_at->diffForHumans()}}</span>
                                </div>
                                <p>
                                    {{$comment->description}}
                                </p>

                                @can('update', $comment)
                                    <button class="btn btn-warning" style="display: inline-block">
                                        <a href="{{route('books.comments.edit', ['book' => $book, 'comment' => $comment])}}">
                                            Изменить
                                        </a>
                                    </button>
                                @endcan
                                @can('delete', $comment)
                                    <form id="delete-comment" action="{{route('books.comments.destroy', ['book' => $book,'comment' => $comment])}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button id="delete-comment-btn" type="submit"
                                                class="mt-3 btn btn-outline-danger btn-sm btn-block">
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-4 fixed">
                <div class="comment-form">
                    <form id="create-comment">
                        @csrf
                        <input type="hidden" id="book_id" value="{{$book->id}}">

                        <div class="form-group" id="formRating">
                            <label for="authorRating" id="authorRating">
                                <select name="rating" id="rating">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </label>
                        </div>
                        <div class="form-group" id="authorDescription">
                            <label for="authorDescription">Comment</label>
                            <textarea name="description" class="form-control" id="commentFormControl" rows="3"
                                      required></textarea>
                        </div>
                        <div class="text-center">
                            <button id="create-comment-btn" type="submit"
                                    class="mt-3 btn btn-outline-primary btn-sm btn-block">Add new
                                comment
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
