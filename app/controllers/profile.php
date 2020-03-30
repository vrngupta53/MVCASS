<?php

namespace Controller;

session_start();

class Profile{
    public function get(){
        if(!isset($_SESSION["email"])){
            header("Location: /");
        }
        $user = \Model\User::get_user_by_uemail($_SESSION["email"]);
        $posts = \Model\Post::get_posts_by_uemail($_SESSION["email"]);
        echo \View\Loader::make()->render("templates/profile.twig", array(
            "user" => $user,
            "posts" => $posts
        ));
    }

    public function post($field){
        if(!isset($_SESSION["email"])){
            header("Location: /");
        }

        $email = $_SESSION["email"];
        if($field == "image"){
            $filename = $_FILES['file']['name'];
            $location = "assets/uploads/".$filename;
            $allowed = array('gif', 'png', 'jpg', 'jpeg');
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if (!in_array($ext, $allowed)) {
                $response = 1;
            }else{
                $response = \Model\User::add_profile_image($filename, $location, $email);
            }
            echo $response;
        }
        else if($field == "username"){
            $username = $_POST["username"];
            \Model\User::update_username($email, $username);
            \Model\Post::update_username($email, $username);
            \Model\Comment::update_username($email, $username);
        }
        else if($field == "password"){
            $password = $_POST["password"];
            \Model\User::update_password($email, $password);
        }
    }
}