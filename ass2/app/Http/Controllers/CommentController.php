<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use App\Friend;
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
        
        $this->validate($request,[          //validate the comments contents
            'message'=>'required'
            ]);
   
        $comment = new Comment();               //create new comment object begin loading the details
        $comment->user = $request->userid;
        $comment->name = $request->name;
        $comment->message = $request->message;
        $comment->id = $request->id;
        $comment->save();                   //saves to DB
        $id = $request->id;
        $comments = DB::table('comments')->where('id', '=', $id)->paginate(6); //loads posts comments and setup pagination
        $sql = "select * from posts where id = $id";
        $post = DB::select($sql);
        $post =  $post[0];                  //loads posts deatils for display
        $sql = "UPDATE posts SET num_com = num_com + 1 WHERE id = (?)";         //update number of comments
        DB::update($sql,array($post->id));
        $sql = "select image from users, posts where users.id = posts.user and posts.id = $id;";    //loads profile image location    
        $image = DB::select($sql);
        $image = $image[0];
        
        return view('pages.post_detail')->with('post', $post)->with('comments', $comments)->with('image', $image); //view comments page and passes the required info
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
        
        $sql = "delete from comments where commentid = ?";          //command to remove comments from DB
        DB::delete($sql, array($id));
        $postid = $request->postid;
        $comments = DB::table('comments')->where('id', '=', $postid)->paginate(6); //loading comments and paginating for use on the comments page
        $sql = "select * from posts where id = ?";
        $post = DB::select($sql, array($request->postid));
        $post =  $post[0];                                               //loads posts deatils for display
        $sql = "UPDATE posts SET num_com = num_com - 1 WHERE id = (?)"; //update number of comments
        DB::update($sql,array($request->postid));
        $id = $request->postid;
        $sql = "select image from users, posts where users.id = posts.user and posts.id = $id;";  //loads profile image location 
        $image = DB::select($sql);
        $image = $image[0];
        return view('pages.post_detail')->with('post', $post)->with('comments', $comments)->with('image', $image);  //view comments page and passes the required info
    }
}
