<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BooksRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookGenre;
use App\Models\Genre;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        $authors = Author::all();
        return view('admin.books.create', compact('genres', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(BooksRequest $request): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    {
        $validated = $request->validated();
        $file = $request->file('picture');
        if (!is_null($file))
        {
            $path = $file->store('pictures/books', 'public');
            $validated['picture'] = $path;
        }
        $book = Book::create($validated);
        for ($i = 0; $i < count($request["genre_id"]); $i++)
        {
            BookGenre::create(["book_id" => $book->id, "genre_id" => $validated["genre_id"][$i]]);
        }
        return redirect()->route('admin.books.index')->with('message', "{$book->name} successfully created");
    }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Book $book): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application
    {
        $genres = Genre::all();
        $authors = Author::all();
        return view('admin.books.edit', compact('book', 'genres', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(BooksRequest $request, Book $book)
    {
        $validated = $request->validated();
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $path = $file->store('pictures/books', 'public');
            $validated['picture'] = $path;

        }
        $book->update($validated);
        $books_genres = BookGenre::all();
        foreach ($books_genres as $book_genre) {
            if ($book_genre->book_id == $book->id) {
                $book_genre->delete();
            }
        }
        for ($i = 0; $i < count($request["genre_id"]); $i++) {
            BookGenre::create(["book_id" => $book->id, "genre_id" => $validated["genre_id"][$i]]);
        }
        return redirect()->route('admin.books.index')->with('message', "{$book->name} successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Book $book
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Book $book): \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    {
        $book->delete();
        return redirect()->route('admin.books.index')->with('message', "{$book->name} successfully deleted");
    }
}
