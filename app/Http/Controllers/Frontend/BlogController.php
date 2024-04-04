<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(3)->withQueryString();
        return view('frontend.pages.blogs.index',compact('blogs'));
    }
    public function detail(Blog $blog)
    {
        return view('frontend.pages.blogs.detail',compact('blog'));
    }

}
