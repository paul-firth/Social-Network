<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Auth;
use app\Post;
use app\Comment;
use app\User;

Route::resource('post', 'PostController');              // setting routes for controllers 
Route::resource('comment', 'CommentController');
Route::resource('user', 'UserController');
Route::resource('friend', 'FriendController');

//Crates main page route and Loads comments to be displayed 

Route::get('/', function(){             // return main page

        $sql = "select * from users, posts where posts.user = users.id order by posts.id desc";
        $users = DB::select($sql);
        return view('pages.main')->with('users', $users);
});
//end

Route::post('/search', function(){                  //Seach function looks for users who contain the letters searched
    $search = request('search');
    $sql = "select * from users where name like '%$search%'";
    $results = DB::select($sql);
    return view('pages.results')->with('results', $results);
    
});

// Route for documentation page
Route::get('/doc', function(){
    return view('pages.doc');
});



// Function too count number of comments for each post
function com_count($postid){
    $sql = "select count(*) from posts, comments where posts.postid = comments.post and posts.postid = ?;";
    $count = DB::select($sql, array($postid));
    return ($count);
    
}

Auth::routes();           //routes for Authorisation

Route::get('/home', 'HomeController@index')->name('home');
