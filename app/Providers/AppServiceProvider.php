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

            $view->with('categories', $categories)->with('category_count', $count);
        });

        // View composer for products table
        view()->composer('admin.products.index', function($view){

            // Get all products
            $products = \App\Product::latest()->paginate(8);

            $view->with('products', $products);
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
