<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',[PagesController::class,'index'])->name('home');


//-----------------------------------Admin---------------------------------//

Route::get('/admin/homeadmin',[AdminController::class,'homeadmin'])->name('homeadmin');
Route::get('/admindash', [AdminController::class, 'admindash'])->name('admindash');
Route::get('/profileadmin', [PagesController::class, 'profileadmin'])->name('profileadmin');
Route::post('/profileadmin', [AdminController::class, 'profileEdit'])->name('profileAdminEdit');
Route::post('/profileadmin', [PagesController::class, 'profileAdminSubmit'])->name('profileadmin');
Route::get('/list', [PagesController::class, 'list'])->name('list');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/adduser', [PagesController::class, 'adduser'])->name('adduser');
Route::post('/adduser', [PagesController::class, 'addUserSubmit'])->name('adduser');
Route::get('/edituser', [PagesController::class, 'edituser'])->middleware('ValidAdmin');
Route::post('/edituser', [PagesController::class, 'editUserSubmit'])->name('edituser');
Route::get('/deleteuser', [PagesController::class, 'deleteuser']);
Route::post('/deleteuser', [PagesController::class, 'deleteUserSubmit'])->name('deleteuser');

//----------------------------User----------------------------//
Route::get('/user/home', [UsersController::class, 'homeUser'])->name('homeuser');
Route::get('/userdash', [UsersController::class, 'userdash'])->name('userdash');
Route::get('/profileuser', [PagesController::class, 'profile'])->name('profileuser');
Route::post('/profileEdit', [PagesController::class, 'profileEdit'])->name('profileEdit');


//----------------------------Login&Registration----------------------------//
Route::get('/login', [PagesController::class, 'login']);
Route::post('/login', [PagesController::class, 'loginSubmit'])->name('login');
//Route::get('/logout', [pagesController::class, 'logout'])->name('logout');

Route::get('/registration', [PagesController::class, 'registration'])->name('registration');
Route::post('/registration', [PagesController::class, 'registrationSubmit'])->name('registration');