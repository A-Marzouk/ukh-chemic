<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Sitemap\Sitemap;
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
        $path = public_path() . '/sitemap.xml' ;

        $siteMap = Sitemap::create();

        $siteMap->add('/');
        $siteMap->add('/catalogue');
        $siteMap->add('/contacts');


        Category::all()->each(function (Category $category) use ($siteMap) {
            $siteMap->add(Url::create("/catalogue/{$category->ID_NAME}"));

            Product::all()->each(function (Product $product) use ($siteMap,$category) {
                $id = $product->id ;
                $siteMap->add(Url::create("/catalogue/{$category->ID_NAME}/{$id}"));
            });

        });

        $siteMap->writeToFile($path);



        return redirect('/ukh-admin');
    }

    public function showContactFormSubmissions(){
        $contacts = Contact::all();
        return view('admin.ContactForm',compact('contacts'));
    }

    public function deleteContact(Request $request){
        // delete contact
        $contact = Contact::where([
            'id' => $request->id
        ])->first();


        if($contact->delete()){
            $contacts = Contact::all();
            return redirect('/admin/contact-form');
        }
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
