<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
use Session;

class UserController extends Controller
{
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        return view('user.edit',compact('user'));
    }

  
    public function update(Request $request, User $user)
    {
        
        $user->update($request->all());
    
        return redirect('profile');
    }

    public function destroy(User $user)
    {
        //
    }
    
  
    public function login(){
        return view('pages.login');
    }
    public function loginUser(Request $request){
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email','=', $request->email)->first();
        if($user)
        {if( md5($request->password, $user->password))
          
            {
            
        if($user && $user->role == 'admin')
        {
          
            $request->session()->put('loginId',$user->id);
            return redirect('admin');

        }
        elseif($user && $user->role == 'user')
        {
            $request->session()->put('loginId',$user->id);
            return redirect('profile'); 
           
        }
    }
}
        else
        {
           return "User name and Password do not match";
        }

        

        
    }
    public function registration(){
        return view('pages.registration');
    }
    public function registerUser(Request $request){
        $validate = $request->validate([
            'name' => 'required| min:3',
            'email' => 'required',
            'password' => 'required',
           
        ]);
        
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  md5($request->password);
        $user->role = "user";
        $user->save();

        return view('pages.login');
    }

    public function dashboard()
    {
        return "Welcome to  dashboard";
    }
    public function admin()
    {
        return "Welcome to admin dashboard";
    }
    public function user()
    {
        return "Welcome to user dashboard";
    }

    public function profile()
    {
        $id = Session::get('loginId');
        $user = User::where('id','=',$id)->first();

        return view("user.userdash",compact('user'));

        

    }

   

    

   

    
}




