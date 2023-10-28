<?php
    
    include_once "connection.php";
    session_start();
    if (isset($_SESSION['unique_id'])) {
    $sql = mysqli_query($con,"SELECT * FROM users");
    
    $output = "";
    
    if(mysqli_num_rows($sql)  > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $lastmsg = "";
            if($row['unique_id'] !== $_SESSION['unique_id']){
                $sql2 = mysqli_query($con, "SELECT * FROM messages 
                WHERE 
                (molchi_id = '{$row['unique_id']}' AND getter_id = '{$_SESSION['unique_id']}') 
                OR 
                (molchi_id = '{$_SESSION['unique_id']}' AND getter_id = '{$row['unique_id']}') 
                ORDER BY msg_id DESC LIMIT 1");


                if(mysqli_num_rows($sql2) > 0){
                $row2 = mysqli_fetch_assoc($sql2);
                if($row2['molchi_id'] == $_SESSION['unique_id'])
                    $lastmsg .= "you :";
                
                $lastmsg .= $row2['message'];}
                $output .= '<a style="text-decoration: none;" href="chat.php?user_id='.$row['unique_id'].'">
    <div class="user">
        <img src="images/'. $row['img'].'" alt="">
        <div class="userdetails">
            <div class="usernamestatususer">
                <div class="name">'. $row['firstname'].  " " . $row['lastname'].'</div>
                <div class="status" style="color: '.($row['status'] === 'offline' ? 'red' : '#00FF00').'">
                    '.$row['status'].' <i style="color: '.($row['status'] === 'offline' ? 'red' : '#00FF00').'" class="fa-solid fa-circle"></i>
                </div>
            </div>
            <div class="last-message">'. $lastmsg.'</div>
        </div>
    </div>
</a>';

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