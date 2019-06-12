<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use DB;

class UserController extends Controller
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
        return view('pages.register');
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
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users,email',
            'dob'=>'required',
            'password'=>'required|min:4',
            'password_confirm'=>'required|min:4|same:password',
            'image'=>'required',
            ]);
        $user = new User();
        $image_store = request()->file('image')->store('profile', 'public');
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dob = $request->dob; 
        $user->password = bcrypt($request['password']); 
        $user->image = "$image_store";
        $user->save();
        $sql = "select *, max(id) from users";
        $user = DB::select($sql);
        $user =  $user[0];
        $posts = "";
        return view('pages.profile')->with('user', $user)->with('posts', $posts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sql = "select * from users, posts where posts.user = users.id and users.id =?";
        $posts = DB::select($sql, array($id));
        
       if (empty($posts)) {
            $sql = "select * from users where id =?";
            $user = DB::select($sql, array($id));
            $user =  $user[0];
            $posts = '';
            return view('pages.profile')->with('user', $user)->with('posts', $posts);
        } else {
            $sql = "select * from users, posts where posts.user = users.id and users.id =?";
            $posts = DB::select($sql, array($id));
            $user =  $posts[0];
            return view('pages.profile')->with('user', $user)->with('posts', $posts);
}   

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $sql = "select * from users where id =?";
            $user = DB::select($sql, array($id));
            $user =  $user[0];
            return view('pages.profile_update')->with('user', $user);
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
//////////////////////ADD Funtion for upload profile pic
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {

        $sql = "delete from comments where user = ?";
        DB::delete($sql, array($id));
       // $sql = "UPDATE posts, users SET num_com = num_com - 1 WHERE users.id = (?)";   /// FIX
       // DB::update($sql,array($id));
        $sql = "delete from posts where id = ?";
        DB::delete($sql, array($id));
        $sql = "delete from users where id = ?";
        DB::delete($sql, array($id));
        $sql = "select * from users, posts where posts.user = users.id order by posts.id desc";
        $users = DB::select($sql);
        return view('pages.main')->with('users', $users);
    }
}
