<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AccessoryCategories;
use Illuminate\Http\Request;

class AccessoryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessory_categories = AccessoryCategories::latest()->get();
        return view('admin.accessory_categories.index', compact('accessory_categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.accessory_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required'
        ]);
        AccessoryCategories::create([
            'name' => $request->name
        ]);
        return redirect(route('admin.accessory_categories.index'))->with('success', "New Accessory Category Created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ac_detail = AccessoryCategories::findOrFail($id);
        return view('admin.accessory_categories.show', compact('ac_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = AccessoryCategories::find($id);
        return view('admin.accessory_categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $a = AccessoryCategories::findOrFail($id);
        $a->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.accessory_categories.index')->with('toast_success', 'Accessory Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $a = AccessoryCategories::findOrFail($id);
        $a->delete();
        return redirect()->route('admin.accessory_categories.index')->with('toast_success', 'Accessory Category deleted successfully.');
    }
}