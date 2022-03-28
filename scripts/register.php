<?php
require_once("../db_connect.php");

$fname=$lname=$email=$password=$confirmPassword="";

//gauname duomenis is registracijos formos

if($_POST){
    if(!empty($_POST['fname']) && !empty($_POST['lname'])  && !empty($_POST['nick']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirmPassword'])){
        $password=$_POST['password'];
        $confirmPassword=$_POST['confirmPassword'];
            if($password===$confirmPassword){
                $fname=$_POST['fname'];
                $lname=$_POST['lname'];
                $email=$_POST['email'];
                $nick=$_POST['nick'];
            } else {
                echo "Passwords do not match";
            }
    } else{
        echo "Please fill all fields";
    }
} else {
    header("Location: http://localhost/forum/views/register.php");
}

//sukeliame duomenis i db

if($password===$confirmPassword){
    $password=password_hash($password, PASSWORD_BCRYPT);
}else{
    die;
}

try{
    $sql = "INSERT INTO users (first_name, last_name, nickname, email, password) VALUES ('$fname', '$lname', '$nick', '$email', '$password')";
    $query = $conn->prepare($sql);
    $query->execute();
    header("Location: ../views/thanks.php");
} catch(PDOException $e){
    echo "Insert failed: ". $e->getMessage();
}

