<?php

namespace Controller;

session_start();

class Post{
    public function get($postid){
        if(!isset($_SESSION['email'])){
            header('Location: /');
        }
        $comments = \Model\Comment::get_comments($postid);
        $post = \Model\Post::get_post_by_postid($postid);
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
        $allowed = array('gif', 'png', 'jpg', 'jpeg');
        $location = "assets/uploads/".$filename;
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $caption = $_POST["caption"];
        $email = $_SESSION["email"];
        if (!in_array($ext, $allowed)) {
            $response = 1;
        }else{
            $response = \Model\Post::upload($filename, $location, $email, $caption);
        }
        echo $response;
    }
}