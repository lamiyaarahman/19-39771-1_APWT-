<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function product()
    {
        $product= array(
            "Name: Introduction to Laravel,
            Author': Mr. X,
            Price': '100Tk ",
            "Name: Advanced Laravel,
            Author': Mr. Y,
            Price': '200Tk ",
            "Name: Laravel From Scratch,
            Author': Mr. Z,
            Price': '300Tk ",
        );
        return view('product')->with('product',$product);
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
