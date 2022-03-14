<?php

$serverName= "localhost";
$userName="root";
$password="";
$dbName="forumas";

try{
    $conn=new PDO("mysql:host=$serverName; dbname=$dbName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfuly";
}catch(PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}

?>
