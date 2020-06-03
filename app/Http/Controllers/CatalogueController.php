<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 3/1/2019
 * Time: 1:57 AM
 */

namespace App\Http\Controllers;


use App\Category;
use App\Photo;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;

class CatalogueController extends Controller
{
    protected $route;

    public function __construct()
    {
        $this->route = Route::currentRouteName();
    }


    public function showProductSinglePage($category_name,$product_id){
        $currentRoute = $this->route ;
        $product  = Product::find($product_id);
        $category = Category::find($product->category_id);
        $title = $product->seo_title ;
        return view('single-product',compact('product','currentRoute','category','title'));
    }

    public function showCataloguePage(){
        $currentRoute = $this->route ;
        $category_name = '';
        $searchedProducts = [] ;
        $title = 'Каталог';
        return view('catalogue',compact('currentRoute','searchedProducts','category_name','title'));
    }

    public function showSingleCataloguePage($category_name){
        $currentRoute = $this->route ;
        $searchedProducts = [] ;
        $title = Category::where('ID_NAME',$category_name)->first()->title;
        return view('catalogue',compact('currentRoute','searchedProducts','category_name','title'));
    }

    public function getCategories(){
        return Category::where('is_active',1)->get();
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

    public function mainSearch(Request $request){
        $keyword = $request->keyword ;
        $currentRoute = $this->route ;
        $searchedProducts = [] ;

        // search in products name :
        if(empty($keyword)){
            return view('catalogue',compact('currentRoute','searchedProducts'));
        }

        $searchArray [] = ['name','like','%'.$keyword.'%'] ;
        $products = Product::where($searchArray)->get();
        $searchedProducts = $products ;
        $category_name = '';
        return view('catalogue',compact('currentRoute','searchedProducts','category_name'));

    }

}
