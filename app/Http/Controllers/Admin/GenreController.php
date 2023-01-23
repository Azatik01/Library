<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenresRequest;
use App\Models\Book;
use App\Models\BookGenre;
use App\Models\Genre;


class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(GenresRequest $request)
    {
        $validated = $request->validated();
        $file = $request->file('picture');
        if (!is_null($file)) {
            $path = $file->store('pictures/genres', 'public');
            $validated['picture'] = $path;
        }
        $genre = Genre::create($validated);
        return redirect()->route('admin.genres.index')->with('message', "{$genre->name} successfully created");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Genre $genre
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        $book_genres = BookGenre::all();
        $array_books = [];
        foreach ($book_genres as $book_genre) {
            if ($book_genre->genre_id == $genre->id) {
                $array_books[] = Book::find($book_genre->book_id);
            }
        }
        return view('admin.genres.show', compact('genre', 'array_books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Genre $genre
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        return view('admin.genres.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Genre $genre
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(GenresRequest $request, Genre $genre)
    {
        $validated = $request->validated();
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $path = $file->store('pictures/genres', 'public');
            $validated['picture'] = $path;

        }
        $genre->update($validated);
        return redirect()->route('admin.genres.show', $genre)->with('message', "{$genre->name} successfully created");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Genre $genre
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        $books_genres = BookGenre::all();
        $array = [];
        foreach ($books_genres as $book_g) {
            $array[] = $book_g->genre_id;
        }
        if (in_array($genre->id, $array)) {
            return redirect()->route('admin.genres.index')->with('message', "Error! {$genre->name} exists in book");
        }
        $genre->delete();
        return redirect()->route('admin.genres.index')->with('message', "{$genre->name} successfully deleted");

    }

}
