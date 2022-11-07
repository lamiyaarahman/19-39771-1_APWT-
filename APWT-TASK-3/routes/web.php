<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PagesController;



Route::get('/', function () {
    return view('welcome');
});

//------------------------login-------------------------//
Route::get('/login',[UserController::class,'login']);
Route::post('/login-user',[UserController::class,'loginUser'])->name('login-user');

//------------------------registration--------------------//
Route::get('/registration',[UserController::class,'registration']);
Route::post('/register-user',[UserController::class,'registerUser'])->name('register-user');

//--------------------------------user-------------------//
Route::get('/dashboard',[UserController::class,'dashboard']);
Route::get('/admin',[UserController::class,'admin']);
Route::get('/user',[UserController::class,'user']);
Route::get('/admindash',[UserController::class,'admindash']);
Route::get('/dashboard',[UserController::class,'dashboard']);
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::resource('user', UserController::class);

//-------------------------------admin----------------------//
Route::get('/admin/userlist', [AdminController::class, 'userlist'])->name('userlist');

//---------------------add---------------------//
Route::get('/addUser', [AdminController::class, 'addUser'])->name('addUser');
Route::post('/addUser', [AdminController::class, 'addUserSubmit'])->name('addUser');

//-----------------------edit--------------------//
Route::get('/editUser/{id}', [AdminController::class, 'editUser']);
Route::post('/editUser', [AdminController::class, 'editUserSubmit'])->name('editUser');

//-----------------------delete-------------------//
Route::get('/deleteUser/{id}', [AdminController::class, 'deleteUser']);

//----------------------------topnav--------------------------//
Route::get('/home', [PagesController::class, 'home'])->name('home');
Route::get('/product', [PagesController::class, 'product'])->name('product');
Route::get('/ourteams', [PagesController::class, 'ourteams'])->name('ourteams');
Route::get('/aboutus', [PagesController::class, 'aboutus'])->name('aboutus');
Route::get('/contactus', [PagesController::class, 'contactus'])->name('contactus');
