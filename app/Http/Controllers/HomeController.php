<?php

namespace App\Http\Controllers;

use App\Contact;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

    public function submitContact(Request $request){
        $this->validator($request->all())->validate();
        $contact = Contact::create($request->toArray());
        return $contact ;
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','min:3'],
            'email' => ['required', 'email', 'max:255','min:3'],
            'title' => ['required', 'string', 'max:255','min:3'],
            'telephone' => ['required', 'regex:/[0-9]/', 'max:255','min:7'],
            'message' => ['required', 'string', 'max:2500','min:3']
        ]);
    }

}
