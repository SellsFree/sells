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
    Route::resource('types', 'App\Http\Controllers\admin\TypeController');   
    Route::get('types/delete/{id}', 'App\Http\Controllers\admin\TypeController@delete');
    Route::get('category', 'App\Http\Controllers\admin\CategoryController@index');
    Route::get('category/create', 'App\Http\Controllers\admin\CategoryController@create');    
    Route::get('category/edit/{id}', 'App\Http\Controllers\admin\CategoryController@edit');
    Route::post('categories/store', 'App\Http\Controllers\admin\CategoryController@store');
    Route::post('categories/update', 'App\Http\Controllers\admin\CategoryController@update');
    Route::get('category/delete/{id}', 'App\Http\Controllers\admin\CategoryController@delete');

    Route::get('district', 'App\Http\Controllers\admin\DistrictController@index');
    Route::get('district/create', 'App\Http\Controllers\admin\DistrictController@create');
    Route::get('district/edit/{id}', 'App\Http\Controllers\admin\DistrictController@edit');
    Route::get('district/delete/{id}', 'App\Http\Controllers\admin\DistrictController@delete');
    Route::post('district/store', 'App\Http\Controllers\admin\DistrictController@store');
    Route::post('district/update', 'App\Http\Controllers\admin\DistrictController@update');

    Route::get('zone', 'App\Http\Controllers\admin\ZoneController@index');
    Route::get('zone/create', 'App\Http\Controllers\admin\ZoneController@create');
    Route::get('zone/edit/{id}', 'App\Http\Controllers\admin\ZoneController@edit');
    Route::get('zone/delete/{id}', 'App\Http\Controllers\admin\ZoneController@delete');
    Route::post('zone/store', 'App\Http\Controllers\admin\ZoneController@store');
    Route::post('zone/update', 'App\Http\Controllers\admin\ZoneController@update');
  
});