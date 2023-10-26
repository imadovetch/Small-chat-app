<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "connection.php";
    

    $molchiid = mysqli_real_escape_string($con, $_POST['molchiid']);
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8'); 
    $parentid = mysqli_real_escape_string($con, $_POST['parentid']);
    if (!empty($message)) {
        
        $stmt = $con->prepare("INSERT INTO messagesgroupes (molchi_idgroupe, messagegroupe,groupeparent) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $molchiid, $message,$parentid);
        
        if ($stmt->execute()) {
           echo "good";
        } else {
            
        }
    }
}else{
    header("Location: ../loginpage.php");
}
?>
