<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    protected $route;

    public function __construct()
    {
        $this->route = Route::currentRouteName();
    }

    public function showWelcomePage(){
        $currentRoute = $this->route ;
        $news = News::all();
        return view('welcome',compact('currentRoute','news'));
    }

    public function showContactsPage(){
        $currentRoute = $this->route ;
        return view('contacts',compact('currentRoute'));
    }

}
