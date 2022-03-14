<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
}
include("../header.php");
require_once("../db_connect.php");

try{
    $sql="SELECT * FROM users";
    $query= $conn->prepare($sql);
    $query->execute();
    $result=$query->fetchAll();

}catch(PDOExeption $e){
    echo "Failed: ". $e->getMessage();
}

?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header bg-success">
                    Hello, <?php echo $_SESSION['username']; ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Users list</h5>
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Nickname</th>
                            <th>Email</th>
                            <th>Created</th>
                            <th>Updated</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach($result as $user){
                            echo "<tr><td>".$user['first_name']."</td><td>".$user['last_name']."</td><td>".$user['nickname']."</td><td>".$user['email']."</td><td>".$user['created']."</td><td>".$user['modified']."</td><td><a class='btn btn-warning' href='users_edit.php?userid=".$user['id']."'>Edit</a><a class='btn btn-danger' href='../scripts/user_delete.php?userid=".$user['id']."'>Delete</a></td></tr>";
                        }
                        ?>
                    </table>
                </div>
                <div class="card-footer text-muted">
                    
                </div>
            </div>
        </div>


    </div>
</div>