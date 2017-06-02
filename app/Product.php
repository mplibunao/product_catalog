<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function scopeFilter($query, $filter)
    {

    	// Check if type of filter is set then construct query builder to return

    	if (isset($filter['category_id']) && $category_id = $filter['category_id']){

    		$query->where('category_id', '=', $category_id);

    	}

    	//$query->where('name', 'like', '%' . $filter['search_filter'] . '%');

    	if (isset($filter['search_filter']) && $search_filter = $filter['search_filter']){

    		$query->where('name', 'like', '%' . $search_filter . '%');

    	}
    	

    	return $query;

    }

    // Returns alphabetically sorted list of all products

    public static function list()
    {
        return Product::latest()->orderBy('name', 'desc')->get();
    }
}
