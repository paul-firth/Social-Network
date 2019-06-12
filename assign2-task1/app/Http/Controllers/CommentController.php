<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use DB;

class CommentController extends Controller
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
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'name'=>'required|max:80',
            'message'=>'required'
            ]);
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->message = $request->message;
        $comment->id = $request->id;
        $comment->save();
        $id = $request->id;
        $sql = "select * from comments where id = $id";
        $comments = DB::select($sql);
        $sql = "select * from posts where id = $id";
        $post = DB::select($sql);
        $post =  $post[0];
        $sql = "UPDATE posts SET num_com = num_com + 1 WHERE id = (?)";
        DB::update($sql,array($post->id));
        return view('pages.post_detail')->with('post', $post)->with('comments', $comments);
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
    public function destroy(Request $request, $id)
    {
        $sql = "delete from comments where commentid = ?";
        DB::delete($sql, array($id));
        $sql = "select * from comments where id = ?";
        $comments = DB::select($sql, array($request->postid));
        $sql = "select * from posts where id = ?";
        $post = DB::select($sql, array($request->postid));
        $post =  $post[0];
        $sql = "UPDATE posts SET num_com = num_com - 1 WHERE id = (?)";
        DB::update($sql,array($request->postid));
        return view('pages.post_detail')->with('post', $post)->with('comments', $comments);
    }
}
