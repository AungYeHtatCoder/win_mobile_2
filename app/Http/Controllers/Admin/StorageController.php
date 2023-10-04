<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Cache\Store;

class StorageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $storages = Storage::all();
        return view('admin.storage.index', compact('storages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.storage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:storages,name'
        ]);

        $storage = new Storage([
            'name' => $request->input('name'),
        ]);

        $storage->save();
        return redirect()->route('admin.storages.index')->with('toast_success', 'Storage created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $storage_detail = Storage::findOrFail($id);
        return view('admin.storage.show', compact('storage_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $storage_edit = Storage::findOrFail($id);
        return view('admin.storage.edit', compact('storage_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request -> validate([
            'name' => 'required|unique:storages,name,' .$id,
        ]);

        $storage = Storage::findOrFail($id);
        $storage->update([
            'name' => $request->name
        ]);
        return redirect()->route('admin.storages.index')->with('toast_success', 'Storage updated successfully.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $storage = Storage::findOrFail($id);
        $storage->destroy();
         return redirect()->route('admin.storages.index')->with('toast_success', 'Storage deleted successfully.');
    }
}