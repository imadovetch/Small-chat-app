<?php
session_start();
include_once "connection.php";

if(isset($_SESSION['unique_id'])){
    echo $_POST['groupname'];
    if(isset($_POST['groupname']) && !empty($_POST['groupname'])){
        $groupname = $_POST['groupname'];
        
        $sql = "INSERT INTO groupes (name) VALUES (?)";
        $stmt = $con->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $groupname);

            if ($stmt->execute()) {
                echo "groupe added";
            } else {
              
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    }else{
        echo "empty";
    }
} else {
    header("Location: ../loginpage.php");
}
?>
