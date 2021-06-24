<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
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
Route::get('/admin/login',[AdminController::class,'login']);
Route::get('/admin/logout',[AdminController::class,'logout']);
Route::post('/admin/login',[AdminController::class,'submit_login']);  
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
//Category
Route::resource('/admin/category',CategoryController::class);
Route::get('/admin/category/{id}/delete',[CategoryController::class,'destroy']);
//posts
Route::resource('/admin/post',PostController::class);
Route::get('/admin/post/{id}/delete',[PostController::class,'destroy']);