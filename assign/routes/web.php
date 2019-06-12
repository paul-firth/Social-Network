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


//Crates main page route and Loads comments to be displayed 

Route::get('/', function(){
    $sql = "select * from posts order by postid desc";
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



// This section deal with creating a new post
Route::post('/add_post_action', function(){
    $name = request('name');
    $title = request('title');
    $message = request('message');
    $post = add_post($name, $title, $message);
    $sql = "select * from posts order by postid desc";
    $posts = DB::select($sql);
    return view('pages.main')->with('posts', $posts);
});

function add_post($name, $title, $message){
    $count = 0;
    $sql = "insert into posts (name, title, message, num_com) values (?, ?, ?, ?)";
    DB::insert($sql, array($name, $title, $message, $count));
    $post = DB::getPdo()->lastInsertID();
    return ($post);
    
}
// end new post section

// This section deals with creating a new comment
Route::post('/add_comment_action', function(){
    $name = request('name');
    $message = request('message');
    $id = request('id');
    $postid = request('id');
    $post = add_comment($name, $message, $id, $postid);
    $post= get_post($id);
    $sql = "select comments.name, comments.message, comments.commentid from comments, posts where posts.postid = comments.post and posts.postid = ? order by comments.commentid";
    $comments = DB::select($sql, array($id));
    return view('pages.post_detail')->with('post', $post)->with('comments', $comments);

});

function add_comment($name, $message, $id, $postid){
    $sql = "insert into comments (name, message, post) values (?, ?, ?)";
    DB::insert($sql, array($name, $message, $id));
    $sql = "UPDATE posts SET num_com = num_com + 1 WHERE postid = (?)";
    DB::update($sql,array($postid));
}
// End Add Comment



// delete comment section
function delete_comment($id, $postid){
    $sql = "delete from comments where commentid = ?";
    DB::delete($sql, array($id));
    $sql = "UPDATE posts SET num_com = num_com - 1 WHERE postid = (?)";
    DB::update($sql,array($postid));
}

Route::post('/delete_comment_action', function(){
    $id = request('id');
    $postid = request('postid');
    $delitem = delete_comment($id, $postid);
    $post = get_post($postid);
    $sql = "select comments.name, comments.message, comments.commentid from comments, posts where posts.postid = comments.post and posts.postid = ? order by comments.commentid";
    $comments = DB::select($sql, array($postid));
    return view('pages.post_detail')->with('post', $post)->with('comments', $comments);
});
//end delete comment section

// Route to the view comments page
Route::get('post_detail/{id}', function($id){
    $post= get_post($id);
    $sql = "select comments.name, comments.message, comments.commentid from comments, posts where posts.postid = comments.post and posts.postid = ? order by comments.commentid";
    $comments = DB::select($sql, array($id));
    return view('pages.post_detail')->with('post', $post)->with('comments', $comments);
});

//Function for retrieving the post details
function get_post($id){
    $sql = "select * from posts where postid=?";
    $posts = DB::select($sql, array($id));
    $post = $posts[0];
    return $post;

}

// delete post section
function delete_post($id){
    $sql = "delete from posts where postid = ?";
    DB::delete($sql, array($id));
}

Route::post('/delete_post_action', function(){
    $id = request('id');
    $delitem = delete_post($id);
    $sql = "select * from posts order by postid desc";
    $posts = DB::select($sql);
    return view('pages.main')->with('posts', $posts);
});
//end delete post section

//Update Post Section
Route::get('update_post/{id}', function($id){
    $post = get_post($id);
    return view('pages.update_post')->with('post', $post);
});

function update_post($id, $name, $title, $message) {
    $sql = "update posts set name = ?, title = ?, message = ? where postid = ?";
    DB::update($sql,array($name, $title, $message, $id));
}

Route::post('/update_post_action', function(){
    $id = request('id');
    $name = request('name');
    $title = request('title');
    $message = request('message');
    $post = update_post($id, $name, $title, $message);
    return redirect("post_detail/$id");
});
//end update post