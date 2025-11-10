<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoriesController;
use App\Http\Controllers\postsController;
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

Route::get('/admin', function () {
    return view('admin.categories');
});

Route::post('/create_category', [categoriesController::class, 'create']);
Route::get('/del_category/{id}', [categoriesController::class, 'delete_category']);

Route::get('/admin/posts', function () {
    return view('admin.posts');
});

Route::post('/create_posts', [postsController::class, 'create_posts']);
Route::get('/del_posts/{id}', [postsController::class, 'delete_posts']);  
