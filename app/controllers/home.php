<?php

namespace Controller;

session_start();

class Home{
    public function get($mode){
        if(!isset($_SESSION['email'])){
            header('Location: /');
        }
        if($mode == "latest"){
            $posts = \Model\Post::get_latest_posts();
            echo \View\Loader::make()->render("templates/latest.twig",  array(
                "posts" => $posts
            ));
        }else if($mode == "top"){
            $posts = \Model\Post::get_top_posts();
            echo \View\Loader::make()->render("templates/top.twig",  array(
                "posts" => $posts
            ));
        }else if($mode == "trending"){
            //insert algo to set trend values
            
            $posts = \Model\Post::get_trending_posts();
            echo \View\Loader::make()->render("templates/top.twig",  array(
                "posts" => $posts
            ));
        }
        

        
    }


}