<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class AdminController extends Controller
{
    protected $route;

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function admin()
    {
        return view('admin.home');
    }

    public function viewProducts(){
        return view('admin.products');
    }
}
