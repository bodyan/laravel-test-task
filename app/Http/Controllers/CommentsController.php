<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comments;
use App\Posts;

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
        //if not logged in  - return empty array
        if(!auth()->id()) return response()->json([]);

        Comments::create([
            'content' => request('comment'),
            'posts_id' => request('id'),
            'user_id' => auth()->id()
        ]);

        $comment = Comments::with('user')->latest()->first();
        $result = [
            'comment' => $comment->content,
            'name' =>  $comment->user->name,
            'date' =>  $comment->created_at->toDateTimeString()
        ];

        return response()->json($result);
    }
}
