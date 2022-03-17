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
//print("<pre>".print_r($result,true)."</pre>");
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
                                // var_dump($result);
                            $id=$user['id'];
                            $sql = "SELECT COUNT(*) amount\n"
                            . "FROM `likes`\n"
                            . "WHERE messages_id='$id';";
                            $query= $conn->prepare($sql);
                            $query->execute();
                            $likes= $query->fetch();
                            if ($userid == $user['user_id']) {
                            echo "<tr><td>".$user['nickname']."</td><td>".$user['message']."</td><td>".$user['created']."</td><td><a href='../scripts/likes.php?postid=".$user['id']."'><i class='fa-solid fa-thumbs-up'></i></a></td><td>".$likes['amount']."</td><td><a class='btn btn-warning' href='forum_edit.php?postid=".$user['id']."'>Edit</a></td></tr>";
                            }else {
                                echo "<tr><td>".$user['nickname']."</td><td>".$user['message']."</td><td>".$user['created']."</td><td><a href='../scripts/likes.php?postid=".$user['id']."'><i class='fa-solid fa-thumbs-up'></i></a></td><td>".$likes['amount']."</td></tr>";
                            }
                        }
                        ?>
                    </table>
                </div>
                <div class="card-footer text-muted">
                <div class="card-header bg-secondary">
                    <form action="../scripts/post.php" method="POST">
                        <textarea name="post" id="" cols="150" rows="1" placeholder="Write something here.."></textarea>
                        <button type="submit" class="btn btn-success btn-lg btn-block">Post</button>
                        <input type="hidden" name="userid" value="<?php echo $result['user_id'];?>">
                    </form>
                </div>
  
                </div>
            </div>
        </div>


    </div>
</div>

<!-- Like mygtukas komentarui
ir komentarui skaiciuojami Like paspaudimai
Useris jei paspaude Like, jo antra karta spausti negali -->

<!-- ir dar surišt su users lentele, jei gerai suprantu
nes vienas postas turi daug laikų ir vienas vartotojas daug postų gali laikint
