<?php
namespace wp;


// Creats a post object with attributes and functions for the users name, the message , the time, an avatar image and comments

class Post{
    protected $user;
    protected $message;
    protected $time;
    protected $avatar;
    protected $comments;
    
    function __construct($user, $message, $time, $avatar){      //initial construct of the object
        $this->user = $user;
        $this->message = $message;
        $this->time = $time;
        $this->avatar = $avatar;
        $this->comments = array();
    }
    
    function getUser(){     // retrieves and returns the users name
        return $this->user;
    }
    
    function getMessage(){      // retrieves and returns the users messgae
        return $this->message;
    }
    
    function getTime(){     // retrieves and returns the utime of the post
        return $this->time;
    }
    
    function getAvatar(){       // retrieves and returns the avatar image
        return $this->avatar;
    }
    
    function getComments(){     // retrieves and returns the comments
        return $this->comments;
    }

    function addComment($user, $comment){       // appends the array comments with new comments
        $this->comments[] = array('user' => $user, 'comment' => $comment);
    }
}

?>