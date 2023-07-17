<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Cmscontroller;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Auth;

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


Route::get('/',[HomeController::class,'index'])->name('home_page');

Route::middleware(['middleware'=>'PreventBackHistory'])->group(function () {
    Auth::routes();
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
        Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
        Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
      
        Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
        Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
        Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword'); 
});
Route::group(['prefix'=>'cms', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
        Route::get('About-Banner',[Cmscontroller::class,'AboutBannerSection'])->name('cms.AboutBannerSection');
        Route::post('insert-banner-data',[Cmscontroller::class,'addBannerData'])->name('addBannerData');
        Route::post('insert-about-data',[Cmscontroller::class,'addAboutData'])->name('addAboutData');
});

Route::group(['middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
        Route::resource('project', ProjectController::class);
        Route::resource('studio', StudioController::class);
        Route::resource('team', TeamController::class);
        Route::resource('location', LocationController::class);
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth','PreventBackHistory']], function(){
        Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
        Route::get('profile',[UserController::class,'profile'])->name('user.profile');
        Route::get('settings',[UserController::class,'settings'])->name('user.settings');
    
});
