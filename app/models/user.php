<?php

namespace Model;

class User{
    public static function verify($email, $password){
        session_start();
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT COUNT(*) AS cnt FROM users WHERE email = ? AND pass = ?");
        $stmt->execute([$email, $password]);
        $row = $stmt->fetch();
        $count = $row["cnt"];

        if($count > 0){
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

    public static function get_user_by_uemail($email){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        return $user;
    }

    public static function add_profile_image($filename, $location, $email){
        if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
            $db = \DB::get_instance();
            $stmt = $db->prepare("UPDATE users SET addr = ? WHERE email = ?");
            $stmt->execute([$location, $email]);
            return 0;
        }else{
            return 1;
        }
    }

    public static function update_username($email, $username){
        $db = \DB::get_instance();
        $stmt = $db->prepare("UPDATE users SET username = ? WHERE email = ?");
        $stmt->execute([$username, $email]);
    }

    public static function update_password($email, $password){
        $db = \DB::get_instance();
        $stmt = $db->prepare("UPDATE users SET pass = ? WHERE email = ?");
        $stmt->execute([$password, $email]);
    }
}