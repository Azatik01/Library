<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorsRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookGenre;

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
        return view('admin.authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorsRequest $request)
    {
        $validated = $request->validated();
        $file = $request->file('picture');
        if(!is_null($file))
        {
            $path = $file->store('pictures/authors', 'public');
            $validated['picture'] = $path;
        }
        $author = Author::create($validated);
        return redirect()->route('admin.authors.index')->with('message', "{$author->first_name} is successfully created");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('admin.authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //dd($author->first_name);
        return view('admin.authors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(AuthorsRequest $request, Author $author)
    {
        $validated = $request->validated();
        if ($request->hasFile('picture'))
        {
            $file = $request->file('picture');
            $path = $file->store('pictures/authors', 'public');
            $validated['picture'] = $path;

        }
        $author->update($validated);
        return redirect()->route('admin.authors.index')->with('message', "{$author->first_name} successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('admin.authors.index')->with('message', "{$author->first_name} successfully deleted");
    }
}
