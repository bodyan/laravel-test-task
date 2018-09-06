<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Validation\Validator;
use App\Posts;
use App\Category;
use App\User;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Show all categories.
     *
     * @return Response
     */
    public function index()
    {
            return view('category.index', ['categories' => Category::all()]);
    }

    /**
     * Show a blog category.
     *
     * @param  Request  $request
     * @return Response
     */
    public function show(Request $request)
    {
        
        $category = Category::with('posts')->find($request->id);

        if($category !== null) 
            return view('category.show', ['category' => $category]);
        else
            return redirect()->action('MainController@index');
    }

    /**
     * Create a blog category.
     *
     * @return Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Update a blog category.
     *
     * @param  Request  $request
     * @return Response
     */
    public function edit(Request $request)
    {
        $category = Category::find($request->id);
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request)
    {
        $category = Category::find($request->id);
        
        $category->title = $request->title;
        $category->description = $request->message;
        $category->save();

        return redirect()->action('MainController@index');
    }

    /**
     * Delete a blog category.
     *
     * @param  Request  $request
     * @return Response
     */
    public function destroy(Request $request)
    {

        Category::destroy($request->id);

        return redirect()->route('home');
    }

    /**
     * Store a new blog category.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Category::create([
            'title' => request('title'),
            'description' => request('message'),
            'user_id' => auth()->id()
        ]);
 		return redirect()->action('MainController@index');
    }

}

