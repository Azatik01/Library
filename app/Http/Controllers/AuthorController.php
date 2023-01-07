<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('client.authors.index', compact('authors'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $books = Book::all();
        $array_books = [];
        foreach ($books as $book)
        {
            if($book->author_id == $author->id)
            {
                $array_books[] = $book;
            }
        }
        return view('client.authors.show', compact('author', 'array_books'));
    }

}
