<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardBlogController;
use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
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
    return view('home', [
        'title' => 'Home',
        'active' => 'home'
    ]);

});

Route::get('blog', [BlogController::class, 'index']);

// kalu {blog} aja hanya mengirimkan id
// Route::get('blog/{blog}', [BlogController::class, 'show']);

// jika {blog:slug} maka slug yang akan dicari
Route::get('blog/{blog:slug}', [BlogController::class, 'show']);

Route::get('categories', [CategoryController::class, 'index']);

// Route::get('categories/{category:slug}', function(Category $category) {
//     return view('blog', [
//         'title' => "Post By Category : $category->name",
//         'active' => 'category',
//         'blogs' => $category->blogs->load('category', 'author'),
//     ]);
// });

// Route::get('authors/{author:username}', function(User $author) {
//     return view('blog', [
//         'title' => "Post By  : $author->name",
//         'active' => 'blog',
//         'blogs' => $author->blogs->load('category', 'author')
//     ]);
// });

Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate']);

// register
Route::get('register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store']);


Route::get('dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::post('logout', [LoginController::class, 'logout']);

Route::resource('dashboard/blogs', DashboardBlogController::class)->middleware('auth');
Route::get('dashboard/blogs/checkSlug', [DashboardBlogController::class, 'checkSlug'])->middleware('auth');

// ini pakai middleware
Route::resource('dashboard/categories', AdminCategoryController::class)->except('show')->middleware('admin');