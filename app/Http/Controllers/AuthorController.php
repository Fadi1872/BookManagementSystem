<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorRequest;
use App\Models\Author;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::all();
        return view("author.index", compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("author.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAuthorRequest $request)
    {
        try {
            Author::create($request->validated());
            return redirect()->route('authors.index')->with('success', 'Authot added successfully!');
        } catch (Exception $e) {
            return redirect()->route('authors.index')->with('error', 'Something went wrong when creating Author');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        return view("author.show", compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        return view("author.edit", compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAuthorRequest $request, Author $author)
    {
        try {
            $author->update($request->validated());

            return redirect()->route("authors.index")->with("success", "Author updated successfully!");
        } catch (ModelNotFoundException $e) {
            return redirect()->route("authors.index")->with("error", "Author not found!");
        } catch (Exception $e) {
            return redirect()->route("authors.index")->with("error", "Something went wrong when updateing the author info!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        try {
            $author->delete();

            return redirect()->route("authors.index")->with("success", "Author deleted successfully!");
        } catch (ModelNotFoundException $e) {
            return redirect()->route("authors.index")->with("error", "Author not found!");
        } catch (Exception $e) {
            return redirect()->route("authors.index")->with("error", "Something went wrong when deleting the author!");
        }
    }
}
