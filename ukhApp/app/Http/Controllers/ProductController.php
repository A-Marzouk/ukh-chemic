<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 7/25/2018
 * Time: 6:39 PM
 */

namespace App\Http\Controllers;


use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getProducts(){
        return Product::all();
    }


    public function addProduct(Request $request){
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

        if(isset($request->id)){
            // edit
            $product = Product::where('id',$request->id)->first();

        }else{
            // add
            $product = new Product;
            $product->category_id = $request->category_id ;
        }

        $product->name = $request->name;
        $product->ID_NAME = $request->ID_NAME;
        $product->price = $request->price;
        $product->old_price = $request->old_price;
        $product->international_name = $request->international_name;
        $product->manufacturer = $request->manufacturer;
        $product->package = $request->package;
        $product->description = $request->description;
        $product->save();

        return $product->id;

    }

    public function deleteProduct(Request $request){
        // delete product
        $product = Product::where('id',$request->productID);
        $product->delete();
        return 'Product has been deleted';
    }

}