<?php
session_start();
    require_once("../db_connect.php");
    include("../header.php");
if($_GET){
    $postid=$_GET['postid'];
    try{
        $sql= "SELECT * FROM `messages`  WHERE id='$postid'";
        $query = $conn->prepare($sql);
        $query->execute();
        $result= $query->fetch();
        
//print("<pre>".print_r($result)."</pre>");
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
                   <form action="../scripts/forum_edit.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group my-3">
                            <input type="text" class="form-control" placeholder="First Name" name="post" value=" <?php echo $result['message'];?>">
                            <input type="hidden" name="postid" value="<?php echo $result['id'];?>">

                        <button type="submit" class="btn btn-secondary my-3">Update</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>

