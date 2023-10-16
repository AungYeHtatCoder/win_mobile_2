<?php

namespace App\Providers;

use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Admin\AccessoryCategories;
use App\Models\Admin\Cart;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
        $categories = Category::where('name', '!=', 'accessory')->get();
        $brands = Brand::all();
        $accessory_cats = AccessoryCategories::all();
        $view->with('accessory_cats', $accessory_cats);
        $view->with('categories', $categories);
        $view->with('brands', $brands);
        $carts = Auth::check() ? Cart::where('user_id', Auth::id())->latest()->get() : null;
        $view->with('carts', $carts);
        });
    }
}
