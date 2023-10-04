<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        Brand::create([
            'name' => $request->name
        ]);
        return redirect(route('admin.brands.index'))->with('success', "New Brand Created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        if(!$brand){
            return redirect()->back()->with('error', "Brand Not Found.");
        }
        $request->validate([
            'name' => 'required'
        ]);
        $brand->update([
            'name' => $request->name
        ]);
        return redirect(route('admin.brands.index'))->with("success", "Brand Updated.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        if(!$brand){
            return redirect()->back()->with('error', "Brand Not Found.");
        }
        $brand->delete();
        return redirect()->back()->with('success', "Brand Deleted.");
    }
}
