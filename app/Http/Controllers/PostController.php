<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Posts;
use App\Category;
use App\User;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dump(App\Posts::with('user')->get()); exit();
        //return view('home', ['posts' => App\Posts::with('user')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'title' => 'required|min:2|max:255',
            'message' => 'required|min:2',
            'category' => 'required'
        ]);

        Posts::create([
            'title' => request('title'),
            'body' => request('message'),
            'category_id' => request('category'),
            'user_id' => auth()->id()
        ]);
        return redirect()->action('MainController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        $posts = Posts::with(['user','category','comments'])->find($post->id);
        return view('posts.show', ['post' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $post = Posts::find($request->id);
        return view('posts.edit', ['post' => $post, 'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate(request(),[
            'title' => 'required|min:2|max:255',
            'message' => 'required|min:2',
            'category' => 'required'
        ]);

        $posts = Posts::find(request('id'));
        
        $posts->title = request('title');
        $posts->body = request('message');
        $posts->category_id = request('category');
        $posts->save();

        return redirect()->route('post.show', ['id' => $request->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        Posts::destroy($request->id);

        return redirect()->route('home');
    }
}
