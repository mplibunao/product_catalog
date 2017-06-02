<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
	public function product()
	{
        return $this->hasMany(Product::class, 'category_id', 'id');
	}

	public static function availableCategory()
    {
    	return Category::latest()->orderBy('name', 'desc');
    }

    public static function scopeFindByName($query, $name)
    {
    	$query->where('name', $name);

    	return $query;
    }

    public function scopeFilter($query, $filter)
    {

        if (isset($filter['search_filter']) && $search_filter = $filter['search_filter']){

            $query->where('name', 'like', '%' . $search_filter . '%');

        }
        
        return $query;

    }
}
