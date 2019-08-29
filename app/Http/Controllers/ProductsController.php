<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Category;
use App\classes\Notification;
use App\classes\Upload;
use App\Exports\ProductsExport;
use App\Imports\ProductsImport;
use App\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getProducts(){
        return Product::all();
    }


    public function getProductCategoryByID($product_id){
        $product = Product::find($product_id); ;
        if($product){
            return Category::find($product->category_id);
        }

        return 'No category match!';
    }

    public function addProduct(Request $request){

        $request->validate([
            'name' => 'max:190|required',
            'seo_title' => 'max:190',
            'meta_description' => 'max:1500',
            'label' => 'max:190',
            'ID_NAME ' => 'max:190',
            'price' => 'max:10',
            'price_500' => 'max:10',
            'price_1000' => 'max:10',
            'international_name' => 'max:190',
            'photo' => 'max:190',
            'manufacturer' => 'max:190',
            'package' => 'max:190',
            'description' => 'max:3000',
        ]);

        $newProduct = false ;
        if(isset($request->id)){
            // edit
            $product = Product::where('id',$request->id)->first();

        }else{
            // add
            $product = new Product;
            $product->category_id = $request->category_id ;
            $newProduct = true ;

        }

        $product->name = $request->name;
        $product->seo_title = $request->seo_title;
        $product->meta_description = $request->meta_description;
        $product->label = $request->label;
        $product->ID_NAME = $request->ID_NAME;
        $product->price = $request->price;
        $product->price_500 =  $request->price_500 ;
        $product->price_1000 = $request->price_1000 ;
        $product->international_name = $request->international_name;
        $product->manufacturer = $request->manufacturer;
        $product->package = $request->package;
        $product->description = $request->description;

        if(isset($request->productImage)){
            $result = Upload::productImage('productImage',date(time()) );
            $product->photo = $result['path'];
        }


        $status = 'fail' ;

        if($product->save()){
           $status = 'success';
        }

        if($newProduct){
            Notification::productHasBeenAdded($product);
        }else{
            Notification::productHasBeenEdited($product);
        }

        return [
            'product' => $product,
            'status' => $status,

        ];
    }

    public function deleteProduct(Request $request){
        // delete product
        $product = Product::where('id',$request->productID);
        $product->delete();
        return 'Product has been deleted';
    }


    public function export()
    {
        Notification::productsAction('Exported');
        return Excel::download(new ProductsExport, 'products.xlsx');
    }
    public function import(Request $request)
    {

        $result  = Upload::productsSheet('productsExcelSheet',date(time()) );
        $filePth = $result['path'];

        Excel::import(new ProductsImport, $filePth);
        Notification::productsAction('Imported');
        return redirect(route('admin.products'));
    }


    public function searchProducts(Request $request){

        $searchArray = [] ;
        // product name :
        if(isset($request->name)){
            $name = $request->name ;
            $searchArray [] = ['name','like','%'.$name.'%'] ;
        }

        // manufacturer :
        if(isset($request->manufacturer)){
            $manufacturer = $request->manufacturer ;
            $searchArray [] = ['manufacturer','like','%'.$manufacturer.'%'] ;
        }

        // product international name :
        if(isset($request->international_name)){
            $international_name= $request->international_name ;
            $searchArray [] = ['international_name','like','%'.$international_name.'%'] ;
        }

        // product description :
        if(isset($request->description)){
            $description= $request->description ;
            $searchArray [] = ['description','like','%'.$description.'%'] ;
        }

        // price :
        if(isset($request->price)){
            $searchArray[] = ['price','<=',intval($request->price)];
        }

        // price_500 :
        if(isset($request->price_500)){
            $searchArray[] = ['price_500','<=',intval($request->price_500)];
        }

        // price_1000 :
        if(isset($request->price_1000)){
            $searchArray[] = ['price_1000','<=',intval($request->price_1000)];
        }




        $products =  Product::where($searchArray)->get();

        return $products ;

    }

}