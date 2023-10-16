<?php

use App\Models\Admin\Product;
use App\Models\Admin\Accessory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\RAMController;
use App\Http\Controllers\Home\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\ShopController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StorageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PhoneRAMController;
use App\Http\Controllers\Admin\AccessoryController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductPriceController;
use App\Http\Controllers\Admin\AccessoryCategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// admin profile image retrieve 
Route::get('storage/{path}', function ($path) {
    return response()->file(storage_path('app/public/' . $path));
})->where('path', '.*');



// my-cart page
Route::get('/my-cart',function(){
    return view('my_cart');
});

// payment page
Route::get('/payment',function(){
    return view('payment');
});

// contact
// Route::get('/contact',function(){
//     return view('contact');
// });

// profile
Route::get('/profile',function(){
    return view('profile');
});

// profile Edit
Route::get('/profile-edit',function(){
    return view('profile_edit');
});

// change-password
Route::get('/change-password',function(){
    return view('change_password');
});

// order-history
Route::get('/order-history',function(){
    return view('order_history');
});

//Frontend Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/aboutus', [HomeController::class, 'aboutus']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

Route::get('/shop', [ShopController::class, 'shop']);
Route::get('/shop/brands/{id}', [ShopController::class, 'brandfilter']);
Route::get('/shop/accessorycategories/{id}', [ShopController::class, 'accessorycategory']);
Route::get('/shop/accessorybrands/{id}', [ShopController::class, 'accessorybrand']);
Route::get('/product_detail/{id}', [ShopController::class, 'product_detail']);
Route::get('/accessory_detail/{id}', [ShopController::class, 'accessory_detail']);

Route::post('/addToCart', [ShopController::class, 'addToCart']);
Route::get('/my-cart', [ShopController::class, 'cart']);
Route::get('/cart/delete/{id}', [ShopController::class, 'cartDelete']);
Route::post('/cart/update/{id}', [ShopController::class, 'cartUpdate']);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth']], function () {
    // Permissions
    Route::delete('permissions/destroy', [PermissionController::class, 'massDestroy'])->name('permissions.massDestroy');
    Route::resource('permissions', PermissionController::class);

    // Roles
    Route::delete('roles/destroy', [RolesController::class, 'massDestroy'])->name('roles.massDestroy');
    Route::resource('roles', RolesController::class);

    // Users
    Route::delete('users/destroy', [UsersController::class, 'massDestroy'])->name('users.massDestroy');
    Route::resource('users', UsersController::class);
    // profile resource rotues
     Route::resource('profiles', ProfileController::class);
    Route::put('/change-password', [ProfileController::class, 'changePassword'])->name('changePassword');
    // PhoneAddressChange route with auth id route with put method
    Route::put('/change-phone-address', [ProfileController::class, 'PhoneAddressChange'])->name('changePhoneAddress');
    Route::put('/change-kpay-no', [ProfileController::class, 'KpayNoChange'])->name('changeKpayNo');
    Route::put('/change-join-date', [ProfileController::class, 'JoinDate'])->name('addJoinDate');

    //banner crud
    Route::resource('banners', BannerController::class);

    //category crud
    Route::resource('categories', CategoryController::class);

    //brand crud
    Route::resource('brands', BrandController::class);

    // Color resource route
    Route::resource('colors', ColorController::class);

    // Storage resource route
    Route::resource('storages', StorageController::class);

    // RAM resource route
    Route::resource('rams', PhoneRAMController::class);

    //Accessory resource route
    Route::resource('accessories', AccessoryController::class);

    //Accessory Category resource route
    Route::resource('accessory_categories', AccessoryCategoryController::class);

    // Product resource route
    Route::resource('products', ProductController::class);
    Route::get('/products/prices/{id}', [ProductController::class, 'pricelist'])->name('products.prices');
    Route::get('/products/prices/create/{id}', [ProductController::class, 'priceCreate']);
    Route::post('/products/prices/create/{id}', [ProductController::class, 'priceStore']);
    Route::get('/products/prices/edit/{id}', [ProductController::class, 'priceEdit']);
    Route::post('/products/prices/edit/{id}', [ProductController::class, 'priceUpdate']);
    Route::delete('/products/prices/delete/{id}', [ProductController::class, 'priceDelete']);


    //Product Price resource route
    Route::resource('product_prices', ProductPriceController::class);

    // Accessory resource route
    Route::resource('accessories', AccessoryController::class);
});

// csrf token error fix
Route::get('/csrf-token', function () {
    return response()->json(['csrfToken' => csrf_token()]);


});