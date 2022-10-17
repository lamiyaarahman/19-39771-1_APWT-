<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        $message = "";
        return view('home')->with('message', $message);
    }
    public function product(){
       
       $names= array(
        "Name: Mouse,
         Id: 1013,
         Price: 500tk",
         "Name: Battery,
         Id: 1015,
         Price: 2000tk",
         "Name: Ear Phone,
         Id: 1018,
         Price: 700tk",
        
        );
        return view('product')
        
        ->with('names',$names);
        
    }

    public function ourteams()
    {
        return view('ourteams');
    }

    public function aboutus()
    {
        return view('aboutus');
    }

    public function contactus()
    {
        return view('contactus');
    }
}