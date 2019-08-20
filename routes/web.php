<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@showWelcomePage')->name('welcome');
Route::get('/contacts','HomeController@showContactsPage')->name('contacts');

Route::get('/catalogue','CatalogueController@showCataloguePage')->name('catalogue');
Route::get('/catalogue/get-product-category/{product_id}','ProductsController@getProductCategoryByID')->name('get.product.category');
Route::get('/catalogue/get/categories','CatalogueController@getCategories')->name('get.categories');
Route::get('/catalogue/get/{category_name}/products','CatalogueController@getCategoryProducts')->name('get.category.products');
Route::post('/catalogue/search','CatalogueController@search')->name('search.product');
Route::post('/catalogue','CatalogueController@mainSearch')->name('search.site');

// edit products images path :
Route::get('/catalogue/edit/products','CatalogueController@editProductsImagesPath')->name('edit.products');


// products routes for admin.
Route::get('/admin/get/products','ProductsController@getProducts')->name('admin.get.products');
Route::post('/admin/add/product','ProductsController@addProduct')->name('admin.add.product');
Route::post('/admin/delete/product','ProductsController@deleteProduct')->name('admin.delete.product');
Route::get('/admin/get/products/{category_id_name}', 'AdminController@getProductsByCategory')->name('admin.products.category');
Route::get('/admin/export/products', 'ProductsController@export')->name('admin.products.export');
Route::post('/admin/import/products', 'ProductsController@import')->name('admin.products.import');
Route::get('/admin/excel/actions', 'AdminController@showExcelActionPage')->name('admin.excel');




Auth::routes();

Route::get('/register',function (){
    return redirect('/login');
});

Route::get('/ukh-admin', 'AdminController@admin')->name('admin.home');
Route::get('/ukh-admin/products', 'AdminController@viewProducts')->name('admin.products');
Route::get('/ukh-admin/{category_id_name}/products', 'AdminController@viewCategoryProducts')->name('admin.category.products');

// public route for products :
Route::get('/catalogue/{category_name}/{product_id}','CatalogueController@showProductSinglePage')->name('catalogue.single.product');