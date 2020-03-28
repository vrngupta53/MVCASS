<?php

namespace Model;

class Comment{
    public static function add_comment($postid, $comment, $email){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT username FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $username = ($stmt->fetch())["username"];
        $datetime = date("Y-m-d H:i:s");
        $stmt = $db->prepare("INSERT INTO comments(postid, uemail, username, comment, created) VALUES(?, ?, ?, ?, ?)");
        $stmt->execute([$postid, $email, $username, $comment, $datetime]);
    }

    public static function get_comments($postid){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT * FROM comments WHERE postid = ? ORDER BY comments.created");
        $stmt->execute([$postid]);
        $comments = $stmt->fetchAll();
        return $comments;
    }
}