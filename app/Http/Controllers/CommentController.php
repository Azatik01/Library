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
            'author' => 'required',
            'rating' => 'required',
            'description' => 'required|min:5'
        ]);
        $comment = new Comment();
        $comment->author = $request->input('author');
        $comment->rating = $request->input('rating');
        $comment->description = $request->input('description');
        $comment->book_id = $book->id;
        $comment->save();
        return response()->json(
            ['comment' => view('client.comments.comment', compact('comment'))->render()],
            201);
    }


}
