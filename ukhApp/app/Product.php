<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'ID_NAME',
        'price',
        'price_500',
        'price_1000',
        'old_price',
        'international_name',
        'manufacturer',
        'package',
        'description',
        'photo',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }
}
