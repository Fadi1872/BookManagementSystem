<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('author')->get();
        return view("books.index", compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $authors = Author::all();
        return view("books.create", compact('categories', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {
        try {
            Book::create($request->validated());
            return redirect()->route('books.index')->with('success' ,'Book created successfully!');
        } catch(Exception $e) {
            return redirect()->route('books.index')->with('error' ,'Something went wrong when creating Book');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view("books.show", compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        $authors = Author::all();
        return view("books.edit", compact('book', 'categories', 'authors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreBookRequest $request, Book $book)
    {
        try {
            $book->update($request->validated());

            return redirect()->route("books.index")->with("success", "Book updated successfully!");
        } catch (ModelNotFoundException $e) {
            return redirect()->route("books.index")->with("error", "Book not found!");
        } catch (Exception $e) {
            return redirect()->route("books.index")->with("error", "Something went wrong when updateing the Book info!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();

            return redirect()->route("books.index")->with("success", "Book deleted successfully!");
        } catch (ModelNotFoundException $e) {
            return redirect()->route("books.index")->with("error", "Book not found!");
        } catch (Exception $e) {
            return redirect()->route("books.index")->with("error", "Something went wrong when deleting the Book!");
        }
    }
}
