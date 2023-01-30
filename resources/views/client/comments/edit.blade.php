@extends('layouts.app')
@section('content')
    <form action="{{ route('books.comments.update', ['book' => $book, 'comment' => $comment])}}" method="post"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="container">
            <label for="comment" style="color: #0a53be">Изменить описание</label>
            <div class="form-group">
                <label for="comment">Оценка</label>
                <br>
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
                <label for="authorDescription">Комментарий</label>
                <textarea name="description" class="form-control" id="commentFormControl" rows="3"
                          required>{{$comment->description}}</textarea>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary mt-3">Сохранить</button>
            </div>
        </div>
    </form>
@endsection
