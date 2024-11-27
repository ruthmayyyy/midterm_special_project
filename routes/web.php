<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'showAllBooks'])->name('showAllBooks');
Route::get('/books/create', [BookController::class, 'createBook'])->name('createBook');
Route::post('/books', [BookController::class, 'storeBook'])->name('storeBook');
Route::get('/books/{id}', [BookController::class, 'readBook'])->name('readBook');
Route::get('/books/{id}/edit', [BookController::class, 'editBook'])->name('editBook');
Route::put('/books/{id}', [BookController::class, 'updateBook'])->name('updateBook');
Route::delete('/books/{id}', [BookController::class, 'deleteBook'])->name('deleteBook');
