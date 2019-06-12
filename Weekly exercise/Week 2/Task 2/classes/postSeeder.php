<?php
namespace wp;
use wp\Post;
include('classes/post.php');


// Class PostSeeder fills an array with posts to be used. Itll be clled from the index.

class PostSeeder{
    public static function seed(){
        $posts =[];
        $posts[] = new Post("Paul Firth", "This is a most unusual paragraph.", "7:27 Pm 9/07/2017", "panda.jpg");
        $posts[] = new Post("Paul Firth", "A Different Post.", "6:15 Pm 9/07/2017", "panda.jpg");
        $posts[] = new Post("Paul Firth", "Something is supposed to be writtten here.", "5:47 Pm 9/07/2017", "panda.jpg");
        return $posts;
    }
    
}

?>