<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $product = Product::find($row['id']);

        if(!$product){
            return ;
        }

        $product->ID_NAME = $row['id_name'];
        $product->name = $row['name'];
        $product->category_id = $row['category_id'];
        $product->description = $row['description'];
        $product->international_name = $row['international_name'];
        $product->manufacturer = $row['manufacturer'];
        $product->package = $row['package'];
        $product->price = $row['price'];
        $product->price_500 = $row['price_500'];
        $product->price_1000 = $row['price_1000'];
        $product->created_at = $row['created_at'];
        $product->updated_at = $row['updated_at'];

        $product->save();

        return $product ;
    }
}
