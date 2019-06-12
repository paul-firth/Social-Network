<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
            'title'=>'required|max:80',
            'message'=>'required'
            ]);
        $post = new Post();
        $post->name = $request->name;
        $post->title = $request->title;
        $post->message = $request->message;
        $post->num_com = 0;
        $post->save();
        $sql = "select * from posts order by id desc";
        $posts = DB::select($sql);
        return view('pages.main')->with('posts', $posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $sql = "select * from comments where id = ?;";
        $comments = DB::select($sql, array($id));
        return view('pages.post_detail')->with('post', $post)->with('comments', $comments);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $post = Post::find($id);
        return view('pages.update_post')->with('post', $post);
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
        $this->validate($request,[
            'name'=>'required|max:80',
            'title'=>'required|max:80',
            'message'=>'required'
            ]);
        $post = Post::find($id);
        $post->name = $request->name;
        $post->title = $request->title;
        $post->message = $request->message;
        $post->save();
        return redirect("/post/$post->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $sql = "delete from posts where id = ?";
        DB::delete($sql, array($id));
        $sql = "delete from comments where id = ?";
        DB::delete($sql, array($id));
        $sql = "select * from posts order by id desc";
        $posts = DB::select($sql);
        return view('pages.main')->with('posts', $posts);
    }
}
