<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use App\Friend;
use DB;
use Eloquent;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

use Auth;

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
        return view('pages.register');   //direct user to registration page NOTE this is not the view that Laravel creates
    }                                   // I built my own registration page and user creation function below

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)                     //User creation function 
    {
       $this->validate($request,[                       ///Validation of user input ensure passwords match eamil is unique
            'name'=>'required|max:255',
            'email'=>'required|email|unique:users,email',
            'dob'=>'required',
            'password'=>'required|min:4',
            'password_confirm'=>'required|min:4|same:password',
            'image'=>'required',
            ]);
        $user = new User();                                                     //create new user object
        $image_store = request()->file('image')->store('profile', 'public');    //Store the uploaded image and pass the location to image_store varible
        $user->name = $request->name;
        $user->email = $request->email;                                 // grabbing the form data
        $user->dob = $request->dob; 
        $user->password = bcrypt($request['password']);         //encrypt the users password
        $user->image = "$image_store";
        $user->save();                                      //save the users details to the database
        $sql = "select *, max(id) from users";      //taking user info from the databse
        $user = DB::select($sql);
        $user =  $user[0];
        $posts = "";                        //new users have no posts but vairble is required for posts page 
        Auth::loginUsingId($user->id);   //allows autologin on creation
        $friends = "";
        return view('pages.profile')->with('user', $user)->with('posts', $posts)->with('friends', $friends); //send the user to their profile page
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sql = "select * from users, posts where posts.user = users.id and users.id =?";  //pulls up data for viewing profile page
        $posts = DB::select($sql, array($id));
        $sql = "select * from friends where usera = $id or userb = $id";  //pulls up data for viewing profile page
        $friends = DB::select($sql);

        if (empty($friends)) {
            $friends = "";
            $sql = "select * from users where id =?";
            $user = DB::select($sql, array($id));
            $user =  $user[0];
            $posts = '';                                //when empty sets the posts value to nothing whist still loading user data
            return view('pages.profile')->with('user', $user)->with('posts', $posts)->with('friends', $friends);
        } else {
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $sql = "select * from users where id =?";       //directs to the profile delete page where a user is asked if they are sure before profile is deleted
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function destroy($id)
    {

        $sql = "delete from comments where user = ?";           //Deletes users comments
        DB::delete($sql, array($id));
        $sql = "delete from posts where id = ?";        //Deletes users posts
        DB::delete($sql, array($id));
        $sql = "delete from users where id = ?";        //deletes users
        DB::delete($sql, array($id));
        $sql = "select * from users, posts where posts.user = users.id order by posts.id desc"; //get info need for main page to load
        $users = DB::select($sql);
        return view('pages.main')->with('users', $users);
    }
}
