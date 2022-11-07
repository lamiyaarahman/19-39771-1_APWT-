<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Requests\UpdateRegistrationRequest;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('registration');
    }
    public function page()
    {
        return view('home');
    }

    public function contact()
    {
        return view('contact');
    }
  
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRegistrationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistrationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegistrationRequest  $request
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegistrationRequest $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registration  $registration
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registration $registration)
    {
        //
    }

    function checkform(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'department' => 'required',
            'gender' => 'required'
        ],
      
        );

        
        $registration = new Registration;
        $registration->name = $request->name;
        $registration->email = $request->email;
        $registration->password = md5($request->password);
        $registration->confirm_password = md5($request->confirm_password);
        $registration->department = $request->department ;
        $registration->gender = $request->gender;
        $registration->save();

        return redirect(route('home'));
    }

    public function form()
    {
        return view('signup');
    }
    function checkuserform(Request $request)
    {
        $validate = $request->validate([
            
            'email' => 'required',
            'password' => 'required',
           
        ],
      
        );

        
    }

    function contactuser(Request $request)
    {
        $validate = $request->validate([
            
            'email' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'password' => 'required',
            'department' => 'required',
            'gender' => 'required',
           
        ],
      
        );

        
    }
}
