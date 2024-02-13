<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

//    public function create()
//    {
//        return view('categories.create');
//    }
//
    public function store(CategoryRequest $request)
    {
        // Validation has passed, create the category

        return Category::create($request->validated());
    }
//
//    public function show(Category $category)
//    {
//        return view('categories.show', compact('category'));
//    }
//
//    public function edit(Category $category)
//    {
//        return view('categories.edit', compact('category'));
//    }
//
    public function update(CategoryRequest $request, Category $category)
    {
        // Validation has passed, update the category
        $category->update($request->validated());

        return $category;
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'Resource deleted successfully'], 204);
    }
}
