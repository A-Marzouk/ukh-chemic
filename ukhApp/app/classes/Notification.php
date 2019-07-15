<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 6/23/2019
 * Time: 3:11 PM
 */

namespace App\classes;


class Notification
{

    public static function productHasBeenAdded(){
        $telegram = new Telegram('-393205618');

        $msg      = "New Product has been added.\n" ;
        $msg      .= "at .\n" ;
        $msg      .= date(now()) ;

        $telegram->sendMessage($msg);
    }

    public static function productHasBeenEdited(){
        $telegram = new Telegram('-393205618');

        $msg      = "Product has been edited.\n" ;
        $msg      .= "at .\n" ;
        $msg      .= date(now()) ;

        $telegram->sendMessage($msg);
    }

    public static function productsAction($action){
        $telegram = new Telegram('-393205618');

        $msg      = "Products have been " . $action . ".\n" ;
        $msg      .= "at .\n" ;
        $msg      .= date(now()) ;

        $telegram->sendMessage($msg);
    }
}