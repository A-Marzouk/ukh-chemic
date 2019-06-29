<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        return view('admin.products');
    }

    public function getProductsByCategory($category_id_name){
        $category_id = Category::where('ID_NAME',$category_id_name)->first()->id;
        $categoryProducts = Product::where('category_id',$category_id)->get();
        return $categoryProducts ;
    }
}
