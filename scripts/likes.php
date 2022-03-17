<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("Location: ../views/my_forum.php");
}

include("../header.php");
require_once("../db_connect.php");

if($_GET){
    try{
        $userid=$_SESSION['userid'];
        $message=$_GET['postid'];
        // var_dump($userid);
        // var_dump($message);

        $sql = "SELECT * FROM likes WHERE messages_id='$message' AND user_id='$userid';";
        $query= $conn ->prepare($sql);
        $query->execute();
        $result= $query->fetchAll();
        // var_dump($result);
            // var_dump($post['user_id']);
            // var_dump($post['messages_id']);
            if(empty($result)){
               $sql = "INSERT INTO likes (user_id, messages_id) VALUES ('$userid', '$message')";
                $query = $conn->prepare($sql);
                $query->execute();
                header("Location: ../views/my_forum.php");
            } else{
                header("Location: ../views/my_forum.php");
            }
            
        
        

    } catch(PDOException $e){
        echo "Insert failed: ". $e->getMessage();
    }
}
