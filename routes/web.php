<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CpanelController;

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


//////////START USER CONTROLLER////////////////////////

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::post('/register',[UserController::class,'registerUser'])->name('user.register');

Route::post('/make',[UserController::class,'createCv'])->name('user.createcv');
Route::post('/update',[UserController::class,'updateCv'])->name('user.updatecv');
Route::post('/login',[UserController::class,'loginUser'])->name('user.login');
Route::post('/updatepwd',[UserController::class,'updatePwd'])->name('user.updatepwd');

Route::post('/deletelang',[UserController::class,'removeLanguage'])->name('user.deletelang');
Route::post('/deleteedu',[UserController::class,'removeEducation'])->name('user.deleteedu');
Route::post('/deleteexp',[UserController::class,'removeExperience'])->name('user.deleteexp');

Route::get('/signout',[UserController::class,'signout'])->name('user.signout');

// Route::get('/dashboard',function(){
//     return view('dashboard');
// })->name('dashboard');

Route::get('/dashboard',[UserController::class,'downloadPersonalInfo'])->name('dashboard');
Route::get('/preview',[UserController::class,'previewCv'])->name('preview');



Route::get('/make',function(){

    if(!empty(session('uid'))){
        return view('makecv');
    }else{
        return redirect()->route('welcome');
    }

    
})->name('createcv');

Route::get('/settings',function(){
    if(!empty(session('uid'))){
        return view('settings');
    }else{
        return redirect()->route('welcome');
    }
})->name('settings');

//////////////END USER CONTROLLER//////////////////////

/////////////START CPANEL CONTROLLER///////////////////


Route::get('/cpanel/login/',function(){
    return view('cpanel_login');
})->name('cpanel.login.view');

Route::post('/capnellogin',[CpanelController::class,'loginToCpanel'])->name('cpanel.login');
Route::post('/cpanelcreate',[CpanelController::class,'createCpanelAccount'])->name('cpanel.save');



// Route::get('/cpanel/home/',function(){
//     return view('cpanel_dashboard');
// })->name('cpanel.home');

Route::get('/cpanel/home/',[CpanelController::class,'viewCpanelHome'])->name('cpanel.home');

Route::get('cpanel/preview/{uid}/',[CpanelController::class,'previewCv'])->name('cpanel.preview');

// Route::get('cpanel/find',function(){
//     return view('cpanel_find');
// })->name('cpanel.find');

Route::get('cpanel/find',[CpanelController::class,'setupFindPage'])->name('cpanel.find');

Route::post('cpanel/search',[CpanelController::class,'searchSeekers'])->name('cpanel.search');

Route::get('/cpanel/account/',function(){
    return view('cpanel_create_account');
})->name('cpanel.createaccount');

