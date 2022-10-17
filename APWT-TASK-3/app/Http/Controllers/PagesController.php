<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
class PagesController extends Controller
{
    public function index(){
        return view('pages.home');
    }
    public function login(){
        return view('pages.login');
    }
    public function loginSubmit(Request $request){
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],
        [
            'email.required' => 'Please enter your email',
            'password.required' => 'Please enter your password',
        ]);

        $userName = $request->input('email');
        $password = $request->input('password');

        return $user = Users::where('email', $request->email)
            ->where('password', md5($request->password))
            ->first();

        if($user && $user->role == "admin"){
            $request->session()->put('user', $user->name);
            return redirect()->route('homeadmin');
        }
        elseif($user && $user->role == "user"){
            $request->session()->put('user', $user->name);
            return redirect()->route('homeuser');
        }
        else{
            return "User name and Password do not match";
        }
    }
    public function logout(){
        session()->forget('user');
        return view('pages.login');
    }
    public function registration(){
        return view('pages.registration');
    }
    public function registrationSubmit(Request $request){
        $validate = $request->validate([
            'name' => 'required| min:3',
            'email' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password',
            'dob' => 'required',
            'gender' => 'required'
        ],
        ['name.required'=>"Please put you name here",
        'name.min'=>"Name must be at least 3 characters long"],
    );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = md5($request->password);
        $user->password_confirmation = md5($request->password_confirmation);

        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->role = "user";
        $user->save();

        return view('user.homeuser');
    }
    public function profile(Request $request){
        $user_name = session()->get('user');
        $user = User::where('name', $user_name)->first();
        return view('user.profileuser')->with('user', $user);   
    }
    public function profileEdit(Request $request){
        $user = User::where('name', $request->name)->where('role', 'user')->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = md5($request->password);
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->role = "user";
        $user->save();
        return redirect()->route('homeuser');
    }

    //.................Admin...............//
    public function profileadmin(Request $request){
       
        return view('admin.profileadmin');
    }
    public function profileAdminSubmit(Request $request){
        $user = User::where('name', $request->name)->where('role', 'admin')->first();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = md5($request->password);
        $user->dob = $request->dob;
        $user->role = 'admin';
        $user->save();
        return redirect()->route('homeadmin');
    }

    public function list(){
        $users = User::where('role', 'user')->get();
        return view('admin.list')->with('users', $users);
    }

    //-----------------edit---------------//
    public function edituser(Request $request){
       
        return view('admin.edituser');
    }
    public function editUserSubmit(Request $request){
      
             $user = User::where ($id,$request->id->first());
            
             return redirect()->route('listadmin');
         
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = md5($request->password);
        $user->password_confirmation = md5($request->password_confirmation);
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->role = "user";
        $user->save();

        return redirect()->route('listadmin');
    
    }
    public function deleteuser(){
      
        return view('admin.deleteuser');
    }
    public function deleteUserSubmit($id){
       $user = User::where ($id);
        $user->delete();
        return redirect()->route('listadmin');
    }
    public function adduser(){
        return view('admin.adduser');
    }
    public function addUserSubmit(Request $request){
        $validate = $request->validate([
            'name' => 'required| min:3',
            'email' => 'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/',
            'password' =>'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6|same:password',
            'dob' => 'required',
            'gender' => 'required'
        ],
        ['name.required'=>"Please put you name here",
        'name.min'=>"Name must be at least 3 characters long"],
    );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = md5($request->password);
        $user->password_confirmation = md5($request->password_confirmation);
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->role = "user";
        $user->save();

        return redirect()->route('listadmin');
    }
}
