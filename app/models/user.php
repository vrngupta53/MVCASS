<?php

namespace Model;

class User{
    public static function verify($email, $password){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT COUNT(*) AS cnt FROM users WHERE email = ? AND pass = ?");
        $stmt->execute([$email, $password]);
        $row = $stmt->fetch();
        $count = $row["cnt"];

        if($count > 0){
            session_start();
            $_SESSION['email'] = $email;
            return 0;
        }else{
            return 1;
        }

    }

    public static function add($email, $username, $password){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT COUNT(*) AS cnt FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        $count = $row["cnt"];

        if($count > 0){
            return 1;
        }else{
            $stmt = $db->prepare("INSERT INTO users(email, username, pass) VALUES(?, ?, ?)");
            $stmt->execute([$email, $username, $password]);
            return 0;
        }
    }
}