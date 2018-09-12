<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Comments;
use App\Posts;
use App\User;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Posts $post)
    {

        $this->validate(request(),[
            'comment' => 'required|min:2',
        ]);

        Comments::create([
            'content' => request('comment'),
            'posts_id' => $post->id,
            'user_id' => auth()->id()
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ajaxstore(Request $request)
    {
        
        $required = ['comment' => 'required|min:2'];

        //if user not logged in, check username field
        if (!auth()->id()) $required['username'] = 'required';

        $validator = Validator::make($request->all(), $required);

        if ($validator->fails())
        {
            return response()->json(['status' => 'error', 'errors'=>$validator->errors()->all()]);
        }

        if (!auth()->id())
            User::create([
                'name' => request('username'),
                'email' => uniqid(),
                'password' => mt_rand(1, 5)             
            ])->comments()->create([
                'content' => request('comment'),
                'posts_id' => request('id')
            ]);

        $comment = Comments::with('user')->latest()->first();

        return response()->json([
            'status' => 'success',
            'comment' => $comment->content,
            'name' =>  $comment->user->name,
            'date' =>  $comment->created_at->toDateTimeString()
        ]);
    }
}
