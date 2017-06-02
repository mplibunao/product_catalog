<?php

// Home

Route::get('/', 'HomeController@index');

// Registration

Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

// Sign In and Sign Out

Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');



/** Admin Panel  **/

Route::get('/admin', 'HomeController@show')->middleware('admin');


// Category

Route::get('/admin/category/create', 'CategoryController@create');

Route::post('/admin/category/create', 'CategoryController@store');

Route::get('/admin/category', 'CategoryController@index');

// To-do
Route::get('/admin/category/search', 'CategoryController@search');

// Product

Route::get('/admin/product/create', 'ProductController@create');

Route::post('/admin/product/create', 'ProductController@store');

Route::get('/admin/product/search/', 'ProductController@search');

Route::get('/admin/product/{product}/edit', 'ProductController@edit');

Route::post('/admin/product/{product}/edit', 'ProductController@update');

/*  /admin/product/?category_id  */
Route::get('/admin/product/', 'ProductController@index');

Route::get('/admin/product/{product}/show', 'ProductController@show');

Route::post('/admin/product/{product}/delete', 'ProductController@destroy');

Route::get('/admin/product/{product}/assign_category', 'ProductController@assignCategory');

// to-do
Route::get('/admin/product/{product}/assign_category/search', 'ProductController@searchCategory');

Route::post('/admin/product/{product}/assign_category', 'ProductController@storeCategory');


