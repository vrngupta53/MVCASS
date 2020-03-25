<?php

namespace Controller;

class Signup{
    public function post(){
        $email = $_POST["email"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $response = \Model\User::add($email, $username, $password);
        echo  $response;
    }
}