<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use App\Friend;
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
       
        $this->validate($request,[          //Validation before storing posts 
            'name'=>'required|max:80',
            'title'=>'required|max:80',
            'message'=>'required'
            ]);
        $post = new Post();                 //create new post object
        $post->user = $request->id;         //requesting the supplied info sent from the form
        $post->name = $request->name;
        $post->title = $request->title;
        $post->message = $request->message;
        $post->num_com = 0;                 //sets num of comments to 0  
        $post->save();                      //saves commiting it to the db
        $sql = "select * from users, posts where posts.user = users.id order by posts.id desc";     //request for all info from posts and user where the post and user are connected by FK orders the info in decsending
        $users = DB::select($sql);
        return view('pages.main')->with('users', $users);  //returns to main page with an array of posts and the users details which main page will loop through
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
    @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);                                    //load  the post details
        //dd($id);// WHAT THE FUCKING SHIT TEST See comments from profile page
        $comments = DB::table('comments')->where('id', '=', $id)->paginate(6);      //load the comments and setup pagination 6 comments per page
        $sql = "select image from users, posts where users.id = posts.user and posts.id = $id;";    //load the posters profile image for displaying
        $image = DB::select($sql);
        
        $image = $image[0];         //change from array into string
        
        return view('pages.post_detail')->with('post', $post)->with('comments', $comments)->with('image', $image);    ///direct user to page with the post its comments and the users image
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $post = Post::find($id);                //load the details of the post and directs to update page
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
        $this->validate($request,[          //perform validation checking on the update post submitted details
            'name'=>'required|max:80',
            'title'=>'required|max:80',
            'message'=>'required'
            ]);
        $post = Post::find($id);        
        $post->name = $request->name;       //loading the update detaiks
        $post->title = $request->title;
        $post->message = $request->message;
        $post->save();                          // save the updated pot and redircet to page           
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
        
        $sql = "delete from posts where id = ?";        //sql command to delete the post
        DB::delete($sql, array($id));
        $sql = "delete from comments where user = ?";  ////sql command to delete the comments for the post
        DB::delete($sql, array($id));
        $sql = "select * from users, posts where posts.user = users.id order by posts.id desc";   //pull  the required infomation to load the main page
        $users = DB::select($sql);
        return view('pages.main')->with('users', $users);
    }
}
