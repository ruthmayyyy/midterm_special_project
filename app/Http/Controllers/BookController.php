<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function showAllBooks(){
        $books = Book::all();
        return view('books', ['books' => $books]);
    }

    public function createBook(){
        return view('create-entry');
    }

    public function storeBook(Request $request){
        $validated = $request->validate(
            [
                'title' => 'required|string|max:225',
                'author' => 'required|string|max:225',
                'genre' => 'required|string|max:225',
                'publication_year' => 'required|date|date',
            ]);

            $books = new Book();
            $books->title = $validated['title'];
            $books->author = $validated['author'];
            $books->genre = $validated['genre'];
            $books->publication_date = $validated['publication_year'];
            $books->save();

            return redirect()->route('showAllBooks')->with('success', "Book Entry Created Successfully.");
    }

    public function readBook(Request $request){
        $books = Book::findorFail($request->id);
        return view('book', ['books' => $books]);
    }

    public function editBook(Request $request){
        $books = Book::find($request->id);
        return view('edit-book', ['books' => $books]);
    }

    public function updateBook(Request $request){
        $validated = $request->validate(
            [
                'title' => 'required|string|max:225',
                'author' => 'required|string|max:225',
                'genre' => 'required|string|max:225',
                'publication_year' => 'required|date|date',
            ]);

            $books = Book::find($request->id);
            $books->title = $validated['title'];
            $books->author = $validated['author'];
            $books->genre = $validated['genre'];
            $books->publication_date = $validated['publication_year'];
            $books->save();
            return redirect()->route('readBook', ['id' => $books->id])->with('success', "Book Updated Successfully.");
    }

    public function deleteBook(Request $request){
        $books = Book::find($request->id);
        if ($books){
            $books->delete();
        }
        return redirect()->route('showAllBooks')->with('success', "Books Deleted Successfully.");
    }

}
