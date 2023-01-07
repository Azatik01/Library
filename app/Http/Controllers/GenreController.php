<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookGenre;
use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        return view('client.genres.index', compact('genres'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        $authors = Author::all();
        $book_genres = BookGenre::all();
        $array_books = [];
        foreach ($book_genres as $book_genre) {
            if ($book_genre->genre_id == $genre->id){
                $array_books[] = Book::find($book_genre->book_id);
            }
        }
        return view('client.genres.show', compact('genre', 'array_books', 'authors'));
    }

}
