<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\GenreController as AdminGenreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GenreController::class, 'index'])->middleware(['auth']);

Route::resource('genres', GenreController::class,)->middleware(['auth'])->only(['index', 'show']);
Route::resource('books', BookController::class)->middleware(['auth'])->only(['index', 'show']);
Route::resource('authors', AuthorController::class)->middleware(['auth'])->only(['index', 'show']);

Route::name('admin.')->prefix('admin')->middleware('auth')->group(function ()
{
    Route::resources([
        'genres' => AdminGenreController::class,
        'books' => AdminBookController::class,
        'authors' => AdminAuthorController::class
    ]);
});

Route::resource('books.comments',
            CommentController::class)
            ->only(['store', 'update', 'edit', 'destroy'])->middleware(['auth']);

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
