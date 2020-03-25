<?php

namespace Controller;

class Login{
    public function get(){
        echo \View\Loader::make()->render("templates/login.twig");
    }

    public function post(){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $response = \Model\User::verify($email, $password);
        echo $response;
    }
}