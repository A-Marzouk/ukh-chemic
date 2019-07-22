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
            'ID_NAME ' => 'max:190',
            'price' => 'max:10',
            'international_name' => 'max:190',
            'photo' => 'max:190',
            'manufacturer' => 'max:190',
            'package' => 'max:190',
            'description' => 'max:1500',
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
        $product->ID_NAME = $request->ID_NAME;
        $product->price = $request->price;
        $product->price_500 = $request->price_500 || '';
        $product->price_1000 = $request->price_1000 || '';
        $product->international_name = $request->international_name;
        $product->manufacturer = $request->manufacturer;
        $product->package = $request->package;
        $product->description = $request->description;

        if(isset($request->productImage)){
            $result = Upload::productImage('productImage',date(time()) );
            $product->photo = $result['path'];
        }


        $product->save();

        if($newProduct){
            Notification::productHasBeenAdded();
        }else{
            Notification::productHasBeenEdited();
        }

        return $product;

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

}