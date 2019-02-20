<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use App\Friend;
use DB;


class FriendController extends Controller
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
        $user = new Friend();                                                     //create new Friend object
        $user->usera = $request->id;
        $user->userb = $request->friendid;                                 // grabbing the form data
        $user->save();
        
        $id = $request->friendid;
        
        $sql = "select * from users, posts where posts.user = users.id and users.id =?";  //pulls up data for viewing profile page
        $posts = DB::select($sql, array($id));
        
        $sql = "select * from friends where usera = $id or userb = $id";  //pulls up data for viewing profile page
        $friends = DB::select($sql);
        
       
       if (empty($posts)) {                                 //had issues when posts was empty so when empty
            $sql = "select * from users where id =?";
            $user = DB::select($sql, array($id));
            $user =  $user[0];
            $posts = '';                                //when empty sets the posts value to nothing whist still loading user data
            return view('pages.profile')->with('user', $user)->with('posts', $posts)->with('friends', $friends);
        } else {
            $sql = "select * from users, posts where posts.user = users.id and users.id =?";    //selecting required info for profile display
            $posts = DB::select($sql, array($id));
            $sql = "select * from users where id =?";
            $user = DB::select($sql, array($id));
            $user =  $user[0];
            return view('pages.profile')->with('user', $user)->with('posts', $posts)->with('friends', $friends); //directs towards profile page with required info for viewing
        }
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
        $delid = $request->delid;
        
        $sql = "delete from friends where id = ?";        //sql command to delete the friendshp
        DB::delete($sql, array($delid));
        
        $sql = "select * from users, posts where posts.user = users.id and users.id =?";  //pulls up data for viewing profile page
        $posts = DB::select($sql, array($id));
        
        
        $sql = "select * from friends where usera = $id or userb = $id";  //pulls up data for viewing profile page
        $friends = DB::select($sql);
        
       
       if (empty($posts)) {                                 //had issues when posts was empty so when empty
            $sql = "select * from users where id =?";
            $user = DB::select($sql, array($id));
            $user =  $user[0];
            $posts = '';                                //when empty sets the posts value to nothing whist still loading user data
            return view('pages.profile')->with('user', $user)->with('posts', $posts)->with('friends', $friends);
        } else {
            $sql = "select * from users, posts where posts.user = users.id and users.id =?";    //selecting required info for profile display
            $posts = DB::select($sql, array($id));
            $sql = "select * from users where id =?";
            $user = DB::select($sql, array($id));
            $user =  $user[0];
            return view('pages.profile')->with('user', $user)->with('posts', $posts)->with('friends', $friends); //directs towards profile page with required info for viewing
        }
    }
}
