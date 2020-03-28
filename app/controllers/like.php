<?php 

namespace Controller;

session_start();

class Like{
    public function post(){
        if(!isset($_SESSION['email'])){
            header('Location: /');
        }

        $postid = $_POST["postid"];
        $email = $_SESSION["email"];
        $likes = \Model\Like::toggle_like($postid, $email);
        echo $likes;
    }
}