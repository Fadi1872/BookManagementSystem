<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        try {
            Category::create($request->validated());
            return redirect()->route('categories.index')->with('success' ,'Category created successfully!');
        } catch(Exception $e) {
            return redirect()->route('categories.index')->with('error' ,'Something went wrong when creating category');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("category.show", compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("category.edit", compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category)
    {
        try {
            $category->update($request->validated());

            return redirect()->route("categories.index")->with("success", "Category updated successfully!");
        } catch (ModelNotFoundException $e) {
            return redirect()->route("categories.index")->with("error", "Category not found!");
        } catch (Exception $e) {
            return redirect()->route("categories.index")->with("error", "Something went wrong when updateing the Category info!");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();

            return redirect()->route("categories.index")->with("success", "Category deleted successfully!");
        } catch (ModelNotFoundException $e) {
            return redirect()->route("categories.index")->with("error", "Category not found!");
        } catch (Exception $e) {
            return redirect()->route("categories.index")->with("error", "Something went wrong when deleting the Category!");
        }
    }
}
