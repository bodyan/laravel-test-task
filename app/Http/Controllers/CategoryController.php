<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use App\User;
use \Illuminate\Validation\Validator;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function index()
    {
            return view('category.index', ['categories' => Category::all()]);
    }

    public function show(Request $request)
    {
        
        $category = Category::find($request->id);

        if($category !== null) 
            return view('category.show', ['category' => $category]);
        else
            return redirect()->action('MainController@index');
    }

    public function create()
    {
        // TODO: add validating for category input
        // Validate the request...
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
        dump($request); exit();
        $category = Category::find($request->id);
        
        $category->title = $request->title;

        $category->save();
    }
    /**
     * Delete a blog category.
     *
     * @param  Request  $request
     * @return Response
     */
    public function delete(Request $request)
    {

        $category = Category::find($request->id);

        if($category !== null) $category->delete();

        return redirect()->action('MainController@index');
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
            'user_id' => auth()->id()
        ]);
 		return redirect()->action('MainController@index');
    }

}
