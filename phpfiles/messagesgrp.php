<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "connection.php";
    

    $molchiid = mysqli_real_escape_string($con, $_POST['molchiid']);
    $parentid = mysqli_real_escape_string($con, $_POST['parentid']);
    $output = "";

    $sql = "SELECT * FROM messagesgroupes 
            LEFT JOIN users ON users.unique_id = messagesgroupes.molchi_idgroupe WHERE (groupeparent = '$parentid') ORDER BY msggroupe_id";
    $query = mysqli_query($con,$sql);
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            if($row['molchi_idgroupe'] === $molchiid){
                $output .= '<div class="msgsender"><img class="imgsender" src="images/'.$row['img'].'" alt="">'.$row['messagegroupe'].'</div>';
            }else{
                $output .= '<div class="msggetter"> <img class="imggetter" src="images/'.$row['img'].'" alt="">'.$row['messagegroupe'].'</div>';

            }
        }
        echo $output;
    }


}else{
    header("Location: ../loginpage.php");
}
?>