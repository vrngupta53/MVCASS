<?php

namespace Controller;

session_start();

class Comment{
    public function post(){
        if(!isset($_SESSION['email'])){
            header('Location: /');
        }
        
        $postid = $_POST["postid"];
        $comment = $_POST["text"];
        $email = $_SESSION["email"];
        \Model\Comment::add_comment($postid, $comment, $email);
        
    }
} 