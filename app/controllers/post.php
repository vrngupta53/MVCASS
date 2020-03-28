<?php

namespace Controller;

session_start();

class Post{
    public function get($postid){
        if(!isset($_SESSION['email'])){
            header('Location: /');
        }
        $comments = \Model\Comment::get_comments($postid);
        $post = \Model\Post::get_post($postid);
        echo \View\Loader::make()->render("templates/post.twig", array(
            "comments" => $comments,
            "post" => $post
        ));
    }

    public function post(){
        if(!isset($_SESSION['email'])){
            header('Location: /');
        }

        $filename = $_FILES['file']['name'];
        $location = "assets/uploads/".$filename;
        $caption = $_POST["caption"];
        $email = $_SESSION["email"];

        //insert filechecks here

        $response = \Model\Post::upload($filename, $location, $email, $caption);
        echo $response;
    }
}