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

use app\Post;
use app\Comment;

Route::resource('post', 'PostController');
Route::resource('comment', 'CommentController');

//Crates main page route and Loads comments to be displayed 

Route::get('/', function(){
        $sql = "select * from posts order by id desc";
        $posts = DB::select($sql);
        return view('pages.main')->with('posts', $posts);
});
//end

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
