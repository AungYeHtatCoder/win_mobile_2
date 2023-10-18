<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Color;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors = Color::latest()->get();
        return view('admin.color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
         'name' => 'required|unique:colors,name',
        ]);

        $color = new Color([
            'name' => $request->input('name'),
        ]);

        $color->save();
        return redirect()->route('admin.colors.index')->with('success', 'Color created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $color_detail = Color::findOrFail($id);
        return view('admin.color.show', compact('color_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $color_edit = Color::findOrFail($id);
        return view('admin.color.edit', compact('color_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'name' => 'required|unique:colors,name,' . $id,
        ]);

        $color = Color::findOrFail($id);
        $color->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.colors.index')->with('success', 'Color updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $color = Color::findOrFail($id);
        $color->delete();
        return redirect()->route('admin.colors.index')->with('success', 'color deleted successfully.');
    }
}