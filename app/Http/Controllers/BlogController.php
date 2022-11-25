<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class BlogController extends Controller
{
    public function index()
    {
        $title = '';
        if(request('category')){
            // cari kategori yang slugnya sama dengan request
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if(request('author')){
            $author = User::firstWhere('username', request('author'));
            $title = ' by '.$author->name;
        }

        return view('blog', [
            "title" => 'All Blogs'. $title,
            "active" => 'blog',
            // mengambil data yang baru diisi
            // filter request diambil dari model method scopeFilter
            "blogs" => Blog::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString() //eager load juga bisa digunakan disini
        ]);
    }

    public function show(Blog $blog)
    {
     return view('show', [
        "title" => "Single Post",
        "active" => 'blog',
        "blog" => $blog
    ]);
 }
}
