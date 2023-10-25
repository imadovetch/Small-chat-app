<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "connection.php";
    

    $molchiid = mysqli_real_escape_string($con, $_POST['molchiid']);
    $getterid = mysqli_real_escape_string($con, $_POST['getterid']);
    $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8'); // Sanitize message input

    if (!empty($message)) {
        
        $stmt = $con->prepare("INSERT INTO messages (getter_id, molchi_id, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $getterid, $molchiid, $message);
        
        if ($stmt->execute()) {
           echo "good";
        } else {
            
        }
    }
}else{
    header("Location: ../loginpage.php");
}
?>

