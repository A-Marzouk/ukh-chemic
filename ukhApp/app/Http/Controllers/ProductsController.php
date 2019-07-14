<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\classes\Notification;
use App\classes\Upload;
use App\Exports\ProductsExport;
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


    public function addProduct(Request $request){
        if(!$this->validate($request)){
            return;
        }
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
        $product->price_500 = $request->price_500;
        $product->price_1000 = $request->price_1000;
        $product->old_price = $request->old_price;
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
        return Excel::download(new ProductsExport, 'products.xlsx');
    }

    protected function validate(Request $request){
        $request->validate([
            'name' => 'max:190|required',
            'ID_NAME ' => 'max:190',
            'price' => 'max:10',
            'old_price' => 'max:10',
            'international_name' => 'max:190',
            'photo' => 'max:190',
            'manufacturer' => 'max:190',
            'package' => 'max:190',
            'description' => 'max:1500',
        ]);
    }

}