<?php
session_start();
if(!isset( $_SESSION['username'])){
    header("Location: login.php");
}
require_once("../db_connect.php");
include("../header.php");

if($_GET){
    try{
        $userid = $_GET['userid'];
        $sql= "SELECT * From users WHERE id= '$userid'";
        $query = $conn->prepare($sql);
        $query->execute();
        $result= $query->fetch();

    }catch(PDOExeption $e){
        echo "Failed: ". $e->getMessage();
    }
}

?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-light mb-8">
                <div class="card-header">You can Edit Here</div>
                <div class="card-body">
                   <form action="../scripts/users_edit.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="First Name" name="fname" value=" <?php echo $result['first_name'];?>">
                        </div>
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="Last Name" name="lname" value= "<?php echo $result['last_name'];?>">
                        </div>
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="Nick name" name="nick" value= "<?php echo $result['nickname'];?>">
                        </div>
                        <div class="form-group my-3">
                            <input type="email" class="form-control" placeholder="Your@email.com" name="email" value=" <?php echo $result['email'];?>">
                        </div>
                        <input type="hidden" name="userid" value="<?php echo $result['id'];?>">
                        <button type="submit" class="btn btn-secondary">Submit</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
