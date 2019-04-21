<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 3/1/2019
 * Time: 1:57 AM
 */

namespace App\Http\Controllers;


use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class CatalogueController extends Controller
{
    protected $route;

    public function __construct()
    {
        $this->route = Route::currentRouteName();
    }

    public function showCataloguePage(){
        $currentRoute = $this->route ;
        return view('catalogue',compact('currentRoute'));
    }

    public function getCategories(){
        return Category::all();
    }

    public function getCategoryProducts($category_name){
        $category = Category::where('ID_NAME',$category_name)->first();
        return $category->products;
    }

    public function editProductsImagesPath(){
        $products = Product::all();
        foreach($products as $product){
            if (strpos($product->photo, 'images') !== false) {
                // word images exists
                continue;
            }
            $product->photo = '/images/products/' . $product->photo ;
            $product->save();
        }
        return $products;
    }

    public function search(Request $request){
        $keyword = $request->keyword ;
        // search in products name :
        if(empty($keyword)){
            return [];
        }
        $searchArray [] = ['name','like','%'.$keyword.'%'] ;

        $products = Product::where($searchArray)->get();
        return $products;
    }

}