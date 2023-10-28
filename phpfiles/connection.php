<?php 
    $con = mysqli_connect("localhost", "root", "" , "chat2");
    if($con){
        echo "";
    }else{
        echo "eror database " . mysqli_connect_error();
    }
?>