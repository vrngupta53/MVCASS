<?php

namespace Controller;

class Home{
    public function get(){
        if(!isset($_SESSION['email'])){
            header('Location: /');
        }
        //use a model to get info and then a view to show homepage to user.
    }


}