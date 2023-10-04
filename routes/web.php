<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PermissionController;

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

Route::get('/', function () {
    return view('index');
});

// Login page
Route::get('/login',function(){
    return view('login');
});

// Register page
Route::get('/register',function(){
    return view('register');
});

// Shop page
Route::get('/shop',function(){
    return view('shop');
});

//product details page
Route::get('/product-details',function(){
    return view('product_details');
});

// my-cart page
Route::get('/my-cart',function(){
    return view('my_cart');
});

// payment page
Route::get('/payment',function(){
    return view('payment');
});

// contact
Route::get('/contact',function(){
    return view('contact');
});

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

Auth::routes();

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
    
});
    
    // csrf token error fix 
    Route::get('/csrf-token', function () {
        return response()->json(['csrfToken' => csrf_token()]);
    });