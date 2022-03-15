<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: users_list.php");
}

include("../header.php");
require_once("../db_connect.php");

$userid = $_SESSION['userid'];
try{
  $sql = "SELECT messages.user_id, messages.id, users.nickname, messages.message, messages.created\n"
    . " FROM `messages`\n"
    . " JOIN users ON users.id=messages.user_id;";
    $query= $conn->prepare($sql);
    $query->execute();
    $result= $query->fetchAll();
}catch(PDOException $e){
    echo "Failed: ". $e->getMessage();
} 
// print("<pre>".print_r($result,true)."</pre>");
?>

<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header bg-success"></div>
                <div class="card-body">
                    <h5 class="card-title">Forum</h5>
                    <table class="table table-striped">
                        <tr>
                            <th>Nickname</th>
                            <th>Post</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach($result as $user){
                            echo "<tr><td>".$user['nickname']."</td><td>".$user['message']."</td><td>".$user['created']."</td><td><a class='btn btn-warning' href='forum_edit.php?postid=".$user['id']."'>Edit</a><a class='btn btn-danger' href='../scripts/forum_delete.php?postid=".$user['id']."'>Delete</a></td></tr>";
                        }
                        ?>
                    </table>
                </div>
                <div class="card-footer text-muted">
                <div class="card-header bg-secondary">
                    <form action="../scripts/post.php" method="POST">
                        <textarea name="post" id="" cols="100" rows="1" placeholder="Write something here.."></textarea>
                        <button type="submit" class="btn btn-success">Post</button>
                    </form>
                </div>
  
                </div>
            </div>
        </div>


    </div>
</div>