<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Brand;
use App\Models\Admin\Color;
use Illuminate\Http\Request;
use App\Models\Admin\Accessory;
use App\Http\Controllers\Controller;
use App\Models\Admin\AccessoryCategories;
use Illuminate\Support\Facades\File;

class AccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accessories = Accessory::latest()->get();
        return view('admin.accessories.index', compact('accessories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $colors = Color::all();
        $accessory_categories = AccessoryCategories::all();
        return view('admin.accessories.create', compact('brands', 'colors', 'accessory_categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'brand_id' => 'required',
        'accessorycat_id' => 'required',
        'img1' => 'required|image|mimes:jpeg,png,jpg,gif', // Add image validation rules here
        'description' => 'required',
    ]);

    $filenames = [];

     // image
        $image = $request->file('img1');
        $ext = $image->getClientOriginalExtension();
        $filename1 = uniqid('product') . '.' . $ext; // Generate a unique filename
        $image->move(public_path('assets/img/products/'), $filename1); // Save the file

        if($request->file('img2')){
            // image
            $image = $request->file('img2');
            $ext = $image->getClientOriginalExtension();
            $filename2 = uniqid('product') . '.' . $ext; // Generate a unique filename
            $image->move(public_path('assets/img/products/'), $filename2); // Save the file
        }else{
            $filename2 = NULL;
        }
        if($request->file('img3')){
            // image
            $image = $request->file('img3');
            $ext = $image->getClientOriginalExtension();
            $filename3 = uniqid('product') . '.' . $ext; // Generate a unique filename
            $image->move(public_path('assets/img/products/'), $filename3); // Save the file
        }else{
            $filename3 = NULL;
        }
        if($request->file('img4')){
            // image
            $image = $request->file('img4');
            $ext = $image->getClientOriginalExtension();
            $filename4 = uniqid('product') . '.' . $ext; // Generate a unique filename
            $image->move(public_path('assets/img/products/'), $filename4); // Save the file
        }else{
            $filename4 = NULL;
        }

    // Create the accessory
    $accessory = Accessory::create([
        'name' => $request->name,
        'brand_id' => $request->brand_id,
        'category_id' => $request->accessorycat_id,
        'img1' => $filename1,
        'img2' => $filename2,
        'img3' => $filename3,
        'img4' => $filename4,
        'description' => $request->description,
    ]);

    // Attach colors
    $colors = [];
    foreach ($request->colors as $color) {
        $colors[$color['color_id']] = [
            'qty' => (int) $color['qty'],
            'normal_price' => (float) $color['normal_price'],
            'discount_price' => (float) $color['discount_price'],
        ];
    }

    $accessory->colors()->attach($colors);
    return redirect()->route('admin.accessories.index')->with('toast_success', 'Accessory Created.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $accessory = Accessory::find($id);
        return view('admin.accessories.show', compact('accessory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $accessory = Accessory::find($id);
        $brands = Brand::all();
        $colors = Color::all();
        $accessory_categories = AccessoryCategories::all();
        return view('admin.accessories.edit', compact('accessory', 'brands', 'colors', 'accessory_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Accessory $accessory)
    {
        if (!$accessory) {
            return redirect()->back()->with('error', 'Accessory Not Found!');
        }

        $request->validate([
            'name' => 'required',
            'brand_id' => 'required',
            'accessorycat_id' => 'required',
            'description' => 'required',
        ]);
        //image1
        if($request->file('img1')){
            //remove product from localstorage
            File::delete(public_path('assets/img/products/'.$accessory->img1));
            // image
            $image = $request->file('img1');
            $ext = $image->getClientOriginalExtension();
            $filename1 = uniqid('product') . '.' . $ext; // Generate a unique filename
            $image->move(public_path('assets/img/products/'), $filename1); // Save the file
        }else{
            $filename1 = $accessory->img1;
        }

        //image 2
        if(!$accessory->img2){
            if($request->file('img2')){
                // image
                $image = $request->file('img2');
                $ext = $image->getClientOriginalExtension();
                $filename2 = uniqid('product') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/products/'), $filename2); // Save the file
            }else{
                $filename2 = NULL;
            }
        }else{
            if($request->file('img2')){
                //remove product from localstorage
                File::delete(public_path('assets/img/products/'.$accessory->img2));
                // image
                $image = $request->file('img2');
                $ext = $image->getClientOriginalExtension();
                $filename2 = uniqid('product') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/products/'), $filename2); // Save the file
            }else{
                $filename2 = $accessory->img2;
            }
        }

        //image3
        if(!$accessory->img3){
            if($request->file('img3')){
                // image
                $image = $request->file('img3');
                $ext = $image->getClientOriginalExtension();
                $filename3 = uniqid('product') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/products/'), $filename3); // Save the file
            }else{
                $filename3 = NULL;
            }
        }else{
            if($request->file('img3')){
                //remove product from localstorage
                File::delete(public_path('assets/img/products/'.$accessory->img3));
                // image
                $image = $request->file('img3');
                $ext = $image->getClientOriginalExtension();
                $filename3 = uniqid('product') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/products/'), $filename3); // Save the file
            }else{
                $filename3 = $accessory->img3;
            }
        }

        //image4
        if(!$accessory->img4){
            if($request->file('img4')){
                // image
                $image = $request->file('img4');
                $ext = $image->getClientOriginalExtension();
                $filename4 = uniqid('product') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/products/'), $filename4); // Save the file
            }else{
                $filename4 = NULL;
            }
        }else{
            if($request->file('img4')){
                //remove product from localstorage
                File::delete(public_path('assets/img/products/'.$accessory->img4));
                // image
                $image = $request->file('img4');
                $ext = $image->getClientOriginalExtension();
                $filename4 = uniqid('product') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/products/'), $filename4); // Save the file
            }else{
                $filename4 = $accessory->img4;
            }
        }

        $accessory->update([
        'name' => $request->name,
        'brand_id' => $request->brand_id,
        'category_id' => $request->accessorycat_id,
        'img1' => $filename1,
        'img2' => $filename2,
        'img3' => $filename3,
        'img4' => $filename4,
        'description' => $request->description,
    ]);
    foreach ($request->colors as $colorId => $colorData) {
    $pivotData = [
        'qty' => (int) $colorData['qty'],
        'normal_price' => (int) $colorData['normal_price'],
        'discount_price' =>(int) $colorData['discount_price'],
    ];
    $accessory->colors()->syncWithoutDetaching([$colorId => $pivotData]);
}


    return redirect()->route('admin.accessories.index')->with('toast_success', 'Accessory Updated.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Accessory $accessory)
    {
         if(!$accessory){
            return redirect()->back()->with('error', "Accesssory Not Found!");
        }
        if($accessory->img1){
            //remove product from localstorage
            File::delete(public_path('assets/img/products/'.$accessory->img1));
        }
        if($accessory->img2){
            //remove product from localstorage
            File::delete(public_path('assets/img/products/'.$accessory->img2));
        }
        if($accessory->img3){
            //remove product from localstorage
            File::delete(public_path('assets/img/products/'.$accessory->img3));
        }
        if($accessory->img4){
            //remove product from localstorage
            File::delete(public_path('assets/img/products/'.$accessory->img4));
        }
        $accessory->delete();
        return redirect()->back()->with('toast_success', "Accessory Deleted.");
    }
}