<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.blogs.index', [
            'blogs' => Blog::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blogs.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // upload image yang simple
        // return $request->file('image')->store('blog-images');

        $validatedData =$request->validate([
            'title' => 'required|max:225',
            'slug' => 'required|unique:blogs',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'body' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('blog-images');
        };

        $validatedData['user_id'] = auth()->user()->id;
        // apakah diujung mau ditambahkan titik titik atau tidak
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

        Blog::create($validatedData);
        return redirect('/dashboard/blogs')->with('success', 'New blog has been added !');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blogs  $blogs
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        // agar tidak bisa melihat dan mengubah post buatan author lain
        if($blog->author->id !== auth()->user()->id){
            abort(403);
        }
        return view('dashboard.blogs.show', [
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {

        // agar tidak bisa melihat dan mengubah post buatan author lain
        if($blog->author->id !== auth()->user()->id){
            abort(403);
        }

        return view('dashboard.blogs.edit', [
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Blog $blog)
    {
        $rules = [
            'title' => 'required|max:225',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            // 'slug' => 'required|unique:blogs',
            'body' => 'required'
        ];

        if($request->slug != $blog->slug)
        {
            $rules['slug'] = 'required|unique:blogs';
        }

        $validatedData = $request->validate($rules);


        if($request->file('image'))
        {
           if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        $validatedData['image'] = $request->file('image')->store('blog-images');
    };

    $validatedData['user_id'] = auth()->user()->id;
        // apakah diujung mau ditambahkan titik titik atau tidak
    $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 100, '...');

    Blog::where('id', $blog->id)->update($validatedData);
    return redirect('/dashboard/blogs')->with('success', 'New blog has been updated !');

}

public function destroy(Blog $blog)
{
    if($blog->image){
        Storage::delete($blog->image);
    }
    Blog::destroy($blog->id);
    return redirect('/dashboard/blogs')->with('success', 'New blog has been daleted !');
}

    // mengecheck slug untuk form create
public function checkSlug(Request $request)
{
        // slug akan berisi dari title
    $slug = SlugService::createSlug(Blog::class, 'slug', $request->title);
    return response()->json(['slug' => $slug]);
}
}
