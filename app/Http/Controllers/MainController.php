<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use App\User;

class MainController extends Controller
{
    public function index()
    {
    	$posts = Posts::with(['user','category'])->get();
    	$categories = Category::all();
    	
		return view('home', ['posts' => $posts, 'categories' => $categories]);
    }
}
