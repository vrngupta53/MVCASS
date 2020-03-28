<?php

namespace Model;

class Like{
    public static function toggle_like($postid, $email){
        $db = \DB::get_instance();
        $stmt = $db->prepare("SELECT COUNT(*) AS cnt FROM likes WHERE postid = ? AND uemail = ?");
        $stmt->execute([$postid, $email]);
        $row = $stmt->fetch();
        if($row["cnt"] == 0){
            $stmt = $db->prepare("INSERT INTO likes(postid, uemail) VALUES (?, ?) ");
            $stmt->execute([$postid, $email]);
            $stmt = $db->prepare("SELECT likes FROM posts WHERE id = ?");
            $stmt->execute([$postid]);
            $likes = ($stmt->fetch())["likes"];
            $likes = $likes+1;
            $stmt = $db->prepare("UPDATE posts SET likes = likes + 1 WHERE id = ?");
            $stmt->execute([$postid]);
            return $likes;
        }else{
            $stmt = $db->prepare("DELETE FROM likes WHERE postid = ? AND uemail = ?");
            $stmt->execute([$postid, $email]);
            $stmt = $db->prepare("SELECT likes FROM posts WHERE id = ?");
            $stmt->execute([$postid]);
            $likes = ($stmt->fetch())["likes"];
            $likes = $likes-1;
            $stmt = $db->prepare("UPDATE posts SET likes = likes - 1 WHERE id = ?");
            $stmt->execute([$postid]);
            return $likes;
        }
    }
}