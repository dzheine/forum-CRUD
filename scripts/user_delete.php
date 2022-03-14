<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: ../views/login.php");
}

require_once("../db_connect.php");

if($_GET){
    try{
        $userid= $_GET['userid'];
        $sql= "DELETE FROM users WHERE id='$userid'";
        $query= $conn->prepare($sql);
        $result= $query->execute();
        if($result){
            header("Location: ../views/user_list.php");
        }
    }catch(PDOException $e){
        echo "Failed: ". $e->getMessage();
    }
} else{
    header("Location: ../views/user_list.php");
}