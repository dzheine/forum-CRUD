<?php
 session_start();
 if(!isset($_SESSION['username'])){
     header("Location: ../views/login.php");
 }

 require_once("../db_connect.php");

if($_POST){
    try{
        $userid= $_POST['userid'];
        $firstname= $_POST['fname'];
        $lastname= $_POST['lname'];
        $nick= $_POST['nick'];
        $email= $_POST['email'];
        // var_dump($_POST);

        $sql= "UPDATE users SET first_name = '$firstname', last_name = '$lastname', nickname = '$nick', email = '$email' WHERE id='$userid'";
        $query= $conn->prepare($sql);
        $result= $query->execute();
        var_dump($result);
        if($result){
            header("Location: ../views/user_list.php");
        }
    }catch(PDOException $e){
        echo "Failed: ". $e->getMessage();
    }
} else{
     header("Location: ../views/user_list.php");
}

?>