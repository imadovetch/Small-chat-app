<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    session_destroy();
    http_response_code(200);
} else {
    header('Location: ../loginpage.php');
}
?>
