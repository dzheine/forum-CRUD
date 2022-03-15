<?php
session_start();
if(!isset($_SESSION['userid'])){
    header("Location: ../views/user_list.php");
}

include("../header.php");
require_once("../db_connect.php");

if($_POST){
    $userid=$_SESSION['userid'];
    $message=$_POST['post'];
}
try{
    $sql = "INSERT INTO messages (user_id, message) VALUES ('$userid', '$message')";
    $query = $conn->prepare($sql);
    $query->execute();
    header("Location: ../views/my_forum.php");
} catch(PDOException $e){
    echo "Insert failed: ". $e->getMessage();
}
