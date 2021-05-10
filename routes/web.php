<?php

use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', 'App\Http\Controllers\HomeController@adminHome')->name('admin')->middleware('is_admin');

Route::group(['middleware' => ['is_admin']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('types', 'App\Http\Controllers\Admin\TypeController');   
    Route::get('sellers', 'App\Http\Controllers\UserController@seller');   
    Route::get('types/delete/{id}', 'App\Http\Controllers\Admin\TypeController@delete');
    Route::get('category', 'App\Http\Controllers\Admin\CategoryController@index');
    Route::get('category/create', 'App\Http\Controllers\Admin\CategoryController@create');    
    Route::get('category/edit/{id}', 'App\Http\Controllers\Admin\CategoryController@edit');
    Route::post('categories/store', 'App\Http\Controllers\Admin\CategoryController@store');
    Route::post('categories/update', 'App\Http\Controllers\Admin\CategoryController@update');
    Route::get('category/delete/{id}', 'App\Http\Controllers\Admin\CategoryController@delete');

    Route::get('district', 'App\Http\Controllers\Admin\DistrictController@index');
    Route::get('district/create', 'App\Http\Controllers\Admin\DistrictController@create');
    Route::get('district/edit/{id}', 'App\Http\Controllers\Admin\DistrictController@edit');
    Route::get('district/delete/{id}', 'App\Http\Controllers\Admin\DistrictController@delete');
    Route::post('district/store', 'App\Http\Controllers\Admin\DistrictController@store');
    Route::post('district/update', 'App\Http\Controllers\Admin\DistrictController@update');

    Route::get('zone', 'App\Http\Controllers\Admin\ZoneController@index');
    Route::get('zone/create', 'App\Http\Controllers\Admin\ZoneController@create');
    Route::get('zone/edit/{id}', 'App\Http\Controllers\Admin\ZoneController@edit');
    Route::get('zone/delete/{id}', 'App\Http\Controllers\Admin\ZoneController@delete');
    Route::post('zone/store', 'App\Http\Controllers\Admin\ZoneController@store');
    Route::post('zone/update', 'App\Http\Controllers\Admin\ZoneController@update');

    Route::get('seller-ads/{id}','App\Http\Controllers\Admin\DashboardController@seller_ads');
    Route::get('all-ads','App\Http\Controllers\Admin\DashboardController@all_ads');
  
});

// users 

Route::group(['middleware' => ['auth']], function() {
    Route::get('profile', 'App\Http\Controllers\HomeController@profile');
    Route::post('profile-update', 'App\Http\Controllers\HomeController@profile_update');
    Route::get('ads', 'App\Http\Controllers\user\PostController@index');
    Route::get('ads-post', 'App\Http\Controllers\user\PostController@create');
    Route::get('/getdistrict/{id}', 'App\Http\Controllers\user\PostController@district');
    Route::get('/getzone/{id}', 'App\Http\Controllers\user\PostController@zone');

    });