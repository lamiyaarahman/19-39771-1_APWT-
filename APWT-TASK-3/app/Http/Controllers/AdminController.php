<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class AdminController extends Controller
{

   public function userlist()
    {
        $user = User::where('role', 'user')->get();
        return view('admin.userlist')->with('user', $user);
    }


   public function addUser()
    {
        return view('admin.addUser');
    }

    public function addUserSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required| min:3',
            'email' => 'required',
            'password' =>'required',
            
        ],
       );

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->role = "user";
        $user->save();

        return redirect()->route('userlist');
    }

     public function editUser(Request $request)
    {
       $user = User::where('id',$request->id)->first();
        return view('admin.editUser')->with( 'user',$user);
    }

    public function editUserSubmit(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->save();

        return redirect()->route('userlist');
    } 

    public function deleteUser(Request $request)
    {
        $user = User::where('id', $request->id);
        $user->delete();
        return redirect()->route('userlist');
        //return view('admin.deleteUser')->with('user', $user);
    }

 /*    public function deleteUserSubmit(Request $request)
    {
        $user = User::where('id', $request->id);
        $user->delete();
        return redirect()->route('userlist');
    } */

    
    

  
}
