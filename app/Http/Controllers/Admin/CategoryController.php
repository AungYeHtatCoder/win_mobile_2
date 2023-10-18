<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Category::create([
            'name' => $request->name
        ]);
        return redirect(route('admin.categories.index'))->with('success', "New Category Created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if(!$category){
            return redirect()->back()->with('error', "Category Not Found.");
        }
        $request->validate([
            'name' => 'required'
        ]);
        $category->update([
            'name' => $request->name
        ]);
        return redirect(route('admin.categories.index'))->with("success", "Category Updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if(!$category){
            return redirect()->back()->with('error', "Category Not Found.");
        }
        $category->delete();
        return redirect()->back()->with('success', "Category Deleted.");
    }
}