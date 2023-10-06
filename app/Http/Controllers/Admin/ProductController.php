<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use App\Models\Admin\Color;
use App\Models\Admin\Product;
use App\Models\Admin\ProductPrice;
use App\Models\Admin\Ram;
use App\Models\Admin\Storage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = Color::all();
        // $categories = Category::where('name', '!=', 'Accessory')->get();
        $storages = Storage::all();
        $rams =  Ram::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('colors', 'storages', 'rams', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'brand_id' => 'required',
            'img1' => 'required',
            'description' => 'required',
            // 'colors[]' => 'required',
            // 'storages[]' => 'required',
            // 'rams[]' => 'required',
        ]);
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
        $product = Product::create([
                    'name' => $request->name,
                    'brand_id' => $request->brand_id,
                    'img1' => $filename1,
                    'img2' => $filename2,
                    'img3' => $filename3,
                    'img4' => $filename4,
                    'description' => $request->description
                ]);

        $product->colors()->sync($request->input('colors', []));
        $product->storages()->sync($request->input('storages', []));
        $product->rams()->sync($request->input('rams', []));

        return redirect(route('admin.products.index'))->with('success', "New Product Created.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $colors = Color::all();
        $storages = Storage::all();
        $rams =  Ram::all();
        $brands = Brand::all();

        return view('admin.products.edit', compact('product', 'colors', 'storages', 'rams', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        if(!$product){
            return redirect()->back()->with('error', "Product Not Found!");
        }
        $request->validate([
            'name' => 'required',
            'brand_id' => 'required',
            'description' => 'required'
        ]);

        //image1
        if($request->file('img1')){
            //remove product from localstorage
            File::delete(public_path('assets/img/products/'.$product->img1));
            // image
            $image = $request->file('img1');
            $ext = $image->getClientOriginalExtension();
            $filename1 = uniqid('product') . '.' . $ext; // Generate a unique filename
            $image->move(public_path('assets/img/products/'), $filename1); // Save the file
        }else{
            $filename1 = $product->img1;
        }

        //image 2
        if(!$product->img2){
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
                File::delete(public_path('assets/img/products/'.$product->img2));
                // image
                $image = $request->file('img2');
                $ext = $image->getClientOriginalExtension();
                $filename2 = uniqid('product') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/products/'), $filename2); // Save the file
            }else{
                $filename2 = $product->img2;
            }
        }

        //image3
        if(!$product->img3){
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
                File::delete(public_path('assets/img/products/'.$product->img3));
                // image
                $image = $request->file('img3');
                $ext = $image->getClientOriginalExtension();
                $filename3 = uniqid('product') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/products/'), $filename3); // Save the file
            }else{
                $filename3 = $product->img3;
            }
        }

        //image4
        if(!$product->img4){
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
                File::delete(public_path('assets/img/products/'.$product->img4));
                // image
                $image = $request->file('img4');
                $ext = $image->getClientOriginalExtension();
                $filename4 = uniqid('product') . '.' . $ext; // Generate a unique filename
                $image->move(public_path('assets/img/products/'), $filename4); // Save the file
            }else{
                $filename4 = $product->img4;
            }
        }

        $product->update([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'img1' => $filename1,
            'img2' => $filename2,
            'img3' => $filename3,
            'img4' => $filename4,
            'description' => $request->description
        ]);
        $product->colors()->sync($request->input('colors', []));
        $product->storages()->sync($request->input('storages', []));
        $product->rams()->sync($request->input('rams', []));

        return redirect(route('admin.products.index'))->with('successs', "Product Updated Successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if(!$product){
            return redirect()->back()->with('error', "Product Not Found!");
        }
        if($product->img1){
            //remove product from localstorage
            File::delete(public_path('assets/img/products/'.$product->img1));
        }
        if($product->img2){
            //remove product from localstorage
            File::delete(public_path('assets/img/products/'.$product->img2));
        }
        if($product->img3){
            //remove product from localstorage
            File::delete(public_path('assets/img/products/'.$product->img3));
        }
        if($product->img4){
            //remove product from localstorage
            File::delete(public_path('assets/img/products/'.$product->img4));
        }
        $product->delete();
        return redirect()->back()->with('success', "Product Deleted.");
    }


    public function pricelist($id)
    {
        $product = Product::find($id);
        $prices = ProductPrice::where('product_id', $id)->latest()->get();
        return view('admin.products.price', compact('prices', 'product'));
    }

    public function priceCreate($id){
        $product = Product::find($id);
        $categories = Category::where('name', '!=', 'Accessory')->get();
        return view('admin.product_prices.create', compact('product', 'categories'));
    }

    public function priceStore(Request $request, $id){
        $product = Product::find($id);
        if(!$product){
            return redirect()->back()->with('error', "Product Not Found.");
        }
        $request->validate([
            'color_id' => 'required',
            'storage_id' => 'required',
            'ram_id' => 'required',
            'category_id' => 'required',
            'qty' => 'required',
            'normal_price' => 'required',
        ]);
        ProductPrice::create([
            'product_id' => $product->id,
            'color_id' => $request->color_id,
            'storage_id' => $request->storage_id,
            'ram_id' => $request->ram_id,
            'category_id' => $request->category_id,
            'qty' => $request->qty,
            'normal_price' => $request->normal_price,
            'discount_price' => $request->discount_price ?? NULL,
        ]);
        return redirect('/admin/products/prices/'.$product->id)->with('success', "New Price of $product->name has been created.");
    }
}
