<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use App\User;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::with(['user','category'])->latest()->get();
        $categories = Category::all();
        
        return view('home', ['posts' => $posts, 'categories' => $categories]);
    }
}
