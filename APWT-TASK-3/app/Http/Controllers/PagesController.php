<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function product()
    {
        
        return view('pages.product');
    }
    
    public function ourteams()
    {
        return view('pages.ourteams');
    }
    public function aboutus()
    {
        return view('pages.aboutus');
    }
    public function contactus()
    {
        return view('pages.contactus');
    }
}
