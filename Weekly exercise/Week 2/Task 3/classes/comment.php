<?php
namespace wp;
use wp\Comment;
include('classes/post.php');



class Comment{
    public static function seedC(){
        $comments =[];
        $comments[] = new comment("Paul Firth", "A comment");
        $comments[] = new comment("Paul Firth", "Another comment");
        $comments[] = new comment("Paul Firth", "Some comments");
        return $comments;
    }
    
}

?>