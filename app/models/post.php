<?php

namespace Model;

class Post{
    public static function upload($filename, $location, $email, $caption){
        if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){
            $db = \DB::get_instance();
            $stmt = $db->prepare("SELECT id, username FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $row = $stmt->fetch();
            $userid = $row["id"];
            $username = $row["username"];
            $datetime = date("Y-m-d H:i:s");
            $likes = 0;
            $stmt = $db->prepare("INSERT INTO posts(addr, caption, created, likes, userid, username) VALUES(?, ?, ?, ?, ?, ?)");
            $stmt->execute([$location, $caption, $datetime, $likes, $userid, $username]);
            return 0;
        }else{
            return 1;
        }
    }

    public static function get_latest_posts(){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM posts ORDER BY posts.created DESC");
        $stmt->execute();
        $posts = $stmt->fetchAll();
        return $posts;
    }

    public static function get_top_posts(){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM posts ORDER BY posts.likes DESC");
        $stmt->execute();
        $posts = $stmt->fetchAll();
        return $posts;
    }
}