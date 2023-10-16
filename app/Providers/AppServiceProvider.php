<?php

namespace App\Providers;

use App\Models\Admin\Brand;
use App\Models\Admin\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Admin\AccessoryCategories;

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
        });
    }
}