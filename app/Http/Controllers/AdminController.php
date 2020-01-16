<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Support\Facades\Session;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;


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


    public function generateMap(){
        $path = public_path() . '/sitemap.json' ;

        $site = SitemapGenerator::create('http://ukh.com.ua/') ;
        $siteMap = $site->getSitemap();

        Category::all()->each(function (Category $category) use ($siteMap) {
            $siteMap->add(Url::create("/catalogue/{$category->ID_NAME}"));

            Product::all()->each(function (Product $product) use ($siteMap,$category) {
                $id = $product->id ;
                if($product->ID_NAME != null){
                    $id =  $product->ID_NAME ;
                }
                $siteMap->add(Url::create("/catalogue/{$category->ID_NAME}/{$id}"));
            });

        });

        $siteMap->writeToFile($path);

        return redirect('/ukh-admin');
    }


    public function viewCategoryProducts($category_id_name){
        Session::put('category_id_name', $category_id_name);
        $savedCategory = $category_id_name;
        return view('admin.products',compact('savedCategory'));
    }

    public function showExcelActionPage(){
        return view('admin.excel_actions');
    }

    public function showNewsPage(){
        return view('admin.news') ;
    }

}
