<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    session_destroy();
    http_response_code(200);
    include_once "connection.php";
    $sql2 = mysqli_query($con, "UPDATE users SET status = 'offline' WHERE unique_id = '{$_SESSION['unique_id']}'");
} else {
    header('Location: ../loginpage.php');
}
?>
