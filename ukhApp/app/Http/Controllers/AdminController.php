<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\Session;


class AdminController extends Controller
{
    protected $route;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function admin()
    {
        $categories = Category::all();
        return view('admin.home',compact('categories'));
    }

    public function viewProducts(){
        // check if there is saved session
        $savedCategory = Session::get('category_id_name');
        return view('admin.products',compact('savedCategory'));
    }

    public function getProductsByCategory($category_id_name){
        $category_id = Category::where('ID_NAME',$category_id_name)->first()->id;
        $categoryProducts = Product::where('category_id',$category_id)->get();
        // save selected category to session :
        Session::put('category_id_name', $category_id_name);
        return $categoryProducts ;
    }

    public function viewCategoryProducts($category_id_name){
        Session::put('category_id_name', $category_id_name);
        $savedCategory = $category_id_name;
        return view('admin.products',compact('savedCategory'));
    }
}
