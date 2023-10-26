<?php
    
    include_once "connection.php";
    session_start();
    if (isset($_SESSION['unique_id'])) {
    $sql = mysqli_query($con,"SELECT * FROM groupes");
    $output = "";
    
    if(mysqli_num_rows($sql)  > 0){
        while($row = mysqli_fetch_assoc($sql)){
            $output .= '<a href="chatgroupe.php?groupe_id='.$row['id'].'"><div class="groupchat"><img src="images/3670297.png" alt="">'.$row['name'].'</div></a>';
        
        }
    }else{
        $output .= "";
    }
    echo $output;
}else{
    header('Location: ../loginpage.php');
}
?>