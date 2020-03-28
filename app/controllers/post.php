<?php

namespace Controller;

session_start();

class Post{

    public function post(){
        $filename = $_FILES['file']['name'];
        $location = "assets/uploads/".$filename;
        $caption = $_POST["caption"];
        $email = $_SESSION["email"];

        //insert filechecks here

        $response = \Model\Post::upload($filename, $location, $email, $caption);
        echo $response;
    }
}