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
        try {
            dump($request->validated());
            $category = Category::create($request->validated());
            return $category;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create category'], 500);
        }
    }
//
    public function show($category)
    {

        return Category::findOrFail($category);
    }
//
//    public function edit(Category $category)
//    {
//        return view('categories.edit', compact('category'));
//    }
//
    public function update(CategoryRequest $request, Category $category)
    {
        // Validation has passed, update the category
        try {
            $category->update($request->validated());
            return $category;
        } catch (\Exception $e) {
            // Handle any exception that might occur during category update
            return response()->json(['error' => 'Failed to update category'], 500);
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['message' => 'Resource deleted successfully'], 204);
    }
}
