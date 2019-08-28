<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 8/28/2019
 * Time: 9:40 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $table = 'news';

    protected $fillable = [
        'title',
        'description',
        'link',
        'date',
        'photo',
    ];


}