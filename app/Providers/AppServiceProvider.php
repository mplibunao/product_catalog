<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View composer for categories sidebar
        view()->composer('layouts.partials.sidebar', function($view){

            $categories = \App\Category::latest()->limit(8)->get()->toArray();

            $count = \App\Category::all()->count();

            $allCategories = \App\Category::availableCategory()->get();

            $view->with('categories', $categories)
                ->with('category_count', $count)
                ->with('allCategories', $allCategories);
        });

        // View composer for products table
        view()->composer('admin.products.index', function($view){

            // Get all products
            $products = \App\Product::latest()->paginate(8);

            $allProducts = \App\Product::list();

            $view->with('products', $products)->with('allProducts', $allProducts);
        });

        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
