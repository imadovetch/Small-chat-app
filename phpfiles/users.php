<?php
    
    include_once "connection.php";
    session_start();
    if (isset($_SESSION['unique_id'])) {
    $sql = mysqli_query($con,"SELECT * FROM users");
    
    $output = "";
    
    if(mysqli_num_rows($sql)  > 0){
        while($row = mysqli_fetch_assoc($sql)){
            if($row['unique_id'] !== $_SESSION['unique_id']){
            $output .= '<a style="text-decoration: none;" href="chat.php?user_id='.$row['unique_id'].'"><div class="user">
            <img src="images/'. $row['img'].'" alt="">
            <div class="usernamestatus">
                <div class="name">'. $row['firstname'].  " " . $row['lastname'].'</div>
                <div class="status">'.$row['status'].' <i class="fa-solid fa-circle"></i></div>
            </div>
        </div></a>';
        }
        }
    }else{
        $output .= "";
    }
    echo $output;
}else{
    header('Location: ../loginpage.php');
}
?>