<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
	// Allow mass assignment for all my models
    protected $guarded = [''];
}
