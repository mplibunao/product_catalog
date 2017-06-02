<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     *  View Products by Category id
     */
    public function index()
    {
        $allProducts = \App\Product::list();

        $products = Product::latest()
            ->filter(request(['category_id']))
            ->paginate(8);

        return view('admin.products.show', compact('products', 'allProducts'));
    }

    /**
     * Create a new Product
     */
    public function create()
    {
        $categories = Category::availableCategory()->get();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store new Product in database
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        /*
        $category_id = NULL;

        // Find Category_id
        if ($category_name = request('category-search'))
        {
            $category_id = Category::findByName($category_name)
                ->first(['id'])->id;
        }
        */

        Product::create([
            'name' => request('name'),
            'stock' => request('stock'),
            'description' => request('description'),
            'image' => request('image'),
            // removed category_id since it causes errors if category string does not have an equivalent category_id
            //'category_id' => $category_id
            //'category_id' => request('category-search')->category()
        ]);

        return redirect('/admin');
    }

    // Show list of Products based on search results

    public function search(Request $request)
    {
        $allProducts = \App\Product::list();

        //return request(['search_filter']);
        $products = Product::latest()
            ->filter(request(['search_filter']))
            ->paginate(8);
            //return $products;
        return view('admin.products.show', compact('products', 'allProducts'));

    }

    // Show category search result when assigning category to product
    public function searchCategory($id)
    {

        $product = Product::find($id);
        // Autocomplete results
        $allCategories = \App\Category::availableCategory()->get();

        // Filter categories by search query
        $categories = Category::latest()
            ->filter(request(['search_filter']))
            ->orderBy('name', 'desc')
            ->paginate(8);

        return view('admin.products.assign_category', compact('product', 'categories', 'allCategories'));

    }


    /**
     * Display the specific Product
     *
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('admin.products.single_view')->with('product', $product);
    }

    /**
     * Show the form for editing Product information
     *
     */
    public function edit(Product $product)
    {   
        $categories = Category::availableCategory()->get();


        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update Product Information in Storage
     */
    public function update($id)
    {

        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
        ]);

        $category_id=NULL;

        // Find Category_id
        if ($category_name = request('category-search'))
        {

            $category_id = Category::findByName($category_name)
                ->first(['id'])->id;
        }

        // Find project by id then update details
        $product = Product::find($id);
        $product->category_id = $category_id;
        $product->name = request('name');
        $product->stock = request('stock');
        $product->description = request('description');
        $product->image = request('image');
        $product->save();

        return redirect('/admin');
    }

    /**
     * Delete specified product in database
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/admin');
    }

    // Assign Product to Category
    public function assignCategory($id)
    {
        $product = Product::find($id);
        $allCategories = \App\Category::availableCategory()->get();

        // Exclude current category if it already exists
        if ($product->category_id !== NULL && $currentCategory = $product->category_id){
            
            $categories = Category::availableCategory()
                ->where('id', '!=', $currentCategory)
                ->orderBy('name', 'desc')
                ->paginate(8);

        } else{

            $categories = Category::availableCategory()
                ->orderBy('name', 'desc')
                ->paginate(8);
        }


        return view('admin.products.assign_category', compact('product', 'categories', 'allCategories'));

    }

    // Store Product's assigned Category
    public function storeCategory($id)
    {
        $this->validate(request(), [
            'category' => 'required'
        ]);

        $product = Product::find($id);
        $product->category_id = request('category');
        $product->save();
        
        return redirect('/admin/product/'. $product->id . '/show');
    }

}
