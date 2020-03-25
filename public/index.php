<?php

require __DIR__."/../vendor/autoload.php";

Toro::serve(array(
    "/" => "\Controller\Login",
    "/home" => "\Controller\Home",
    "/signup" =>"\Controller\Signup",

));