<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "connection.php";
    

    $molchiid = mysqli_real_escape_string($con, $_POST['molchiid']);
    $getterid = mysqli_real_escape_string($con, $_POST['getterid']);

    $output = "";

    $sql = "SELECT * FROM messages 
            LEFT JOIN users ON users.unique_id = messages.molchi_id 
            WHERE (molchi_id = '$molchiid' AND getter_id = '$getterid') OR (getter_id = '$molchiid' AND molchi_id = '$getterid') ORDER BY msg_id";
    $query = mysqli_query($con,$sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            if($row['molchi_id'] === $molchiid){
                $output .= '<div class="msgsender"><img class="imgsender" src="images/'.$row['img'].'" alt="">'.$row['message'].'</div>';
            }else{
                $output .= '<div class="msggetter"> <img class="imggetter" src="images/'.$row['img'].'" alt="">'.$row['message'].'</div>';

            }
        }
        echo $output;
    }


}else{
    header("Location: ../loginpage.php");
}
?>