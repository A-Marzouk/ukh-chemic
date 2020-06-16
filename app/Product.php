<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'seo_title',
        'meta_description',
        'label',
        'ID_NAME',
        'price',
        'price_500',
        'price_1000',
        'international_name',
        'manufacturer',
        'package',
        'description',
        'photo',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function getSlugAttribute(): string
    {
        return str_slug($this->seo_title);
    }

    public function getUrlAttribute(): string
    {
        $category = Category::find($this->category_id);
        return action('CatalogueController@showProductSinglePage', [$category->ID_NAME,$this->id, $this->slug]);
    }


    public function photos(){
        return $this->hasMany(Photo::class);
    }
}
