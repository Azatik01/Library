<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;
//use Symfony\Component\HttpFoundation\JsonResponse;

class CommentController extends Controller
{
    public function store(Request $request, Book $book)
    {

        $request->validate([
            'rating' => "required|regex:'[1-5]'",
            'description' => 'required|min:5'
        ]);
        $comment = new Comment();
        $comment->rating = $request->input('rating');
        $comment->description = $request->input('description');
        $comment->book_id = $book->id;
        $comment->user_id = $request->user()->id;
        $comment->save();
        return response()->json(
            ['comment' => view('client.comments.comment', compact('comment'))->render()],
            201);
    }

    public function edit(Book $book, Comment $comment)
    {
        return view('client.comments.edit', compact('comment', 'book'));
    }

    public function update(Book $book, Request $request, Comment $comment)
    {
        $this->authorize('update', $comment);
        $validated = $request->validate([
            'rating' => "required|regex:'[1-5]'",
            'description' => 'required|min:5'
        ]);
        $comment->update($validated);
        return redirect()->route('books.show', compact('book', 'comment'));
    }

    public function destroy(Book $book, Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return redirect()->route('books.show', compact('book', 'comment'));
    }

}
