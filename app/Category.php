<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public function products()
	{
		return $this->hasMany(Product::class);
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
}
