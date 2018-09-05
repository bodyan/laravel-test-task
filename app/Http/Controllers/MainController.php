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
    	return view('home', ['posts' => Posts::all()]);
    }
}
