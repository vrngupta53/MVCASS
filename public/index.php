<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Login",
    "/home/:string" => "\Controller\Home",
    "/signup" =>"\Controller\Signup",
    "/post" => "\Controller\Post",
    "/post/:string" => "\Controller\Post",
));