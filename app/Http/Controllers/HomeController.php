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
        $title = 'Главная';
        return view('welcome',compact('currentRoute','news','title'));
    }

    public function showContactsPage(){
        $currentRoute = $this->route ;
        $title = 'Связаться с нами';
        return view('contacts',compact('currentRoute','title'));
    }

}
