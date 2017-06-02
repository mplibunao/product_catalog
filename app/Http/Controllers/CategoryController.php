<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('admin');
    }

    /**
     * 
     */
    public function index()
    {

        $allCategories = \App\Category::availableCategory()->get();

        $categories = Category::availableCategory()
            ->orderBy('name', 'desc')
            ->paginate(8);

        return view('admin.categories.index', compact('categories', 'allCategories'));
    }

    // Show All products based on search results
    public function search()
    {
        $allCategories = \App\Category::availableCategory()->get();

        $categories = Category::latest()
            ->filter(request(['search_filter']))
            ->paginate(8);

        return view('admin.categories.index', compact('allCategories', 'categories'));
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required',
            'image' => 'url'
        ]);

        Category::create([
            'name' => request('name'),
            'description' => request('description'),
            'image' => request('image')
        ]);

        return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
