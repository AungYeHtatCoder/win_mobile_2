<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Ram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhoneRAMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rams = Ram::latest()->get();
        return view('admin.ram.index', compact('rams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ram.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
         'name' => 'required|unique:Rams,name',
        ]);

        $color = new Ram([
            'name' => $request->input('name'),
        ]);

        $color->save();
        return redirect()->route('admin.rams.index')->with('success', 'RAM created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ram_detail = Ram::findOrFail($id);
        return view('admin.ram.show', compact('ram_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ram_edit = Ram::findOrFail($id);
        return view('admin.ram.edit', compact('ram_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request -> validate([
            'name' => 'required|unique:rams,name,' . $id,
        ]);

        $color = Ram::findOrFail($id);
        $color->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.rams.index')->with('success', 'RAM updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ram_del = Ram::findOrFail($id);
        $ram_del->delete();
        return redirect()->route('admin.rams.index')->with('success', 'RAM deleted successfully.');
    }
}