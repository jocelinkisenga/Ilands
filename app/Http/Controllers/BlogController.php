<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index () {
        return view("pages.blog", ["articles" => Content::where("type" ,"=", "blog")->get()]);
    }

    public function show (string $slug) {
        $article =  Content::whereSlug($slug)->firstOrFail();
        return view("pages.blog.details",["article" => $article]);
    }
}
