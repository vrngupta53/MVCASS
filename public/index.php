<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Login",
    "/home/:string" => "\Controller\Home",
    "/signup" =>"\Controller\Signup",
    "/post" => "\Controller\Post",
    "/post/:number" => "Controller\Post",
    "/like" => "\Controller\Like",
    "/comment" => "\Controller\Comment",
    "/profile" => "\Controller\Profile",
    "/profile/:string" => "\Controller\Profile",
    
));