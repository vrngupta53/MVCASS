<?php

namespace Controller;

session_start();

class Profile{
    public function get(){
        if(!isset($_SESSION["email"])){
            header("Location: /");
        }
    }
}