<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        return view('/blogs/blogs',[
            "title" => "BLOGS",
            "posts" => Post::latest()->paginate(9)->withQueryString()
        ]);
    }
    
    public function show(Post $post){
        return view('blog/blog',[
            "title" => "BLOG",
            "post" => $post
        ]);
    }
}
