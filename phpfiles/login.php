<?php
include_once "connection.php";
session_start();
$password = mysqli_real_escape_string($con, $_POST['password']);
$email = mysqli_real_escape_string($con, $_POST['email']);

if (!empty($password) && !empty($email)) {
    $sql = mysqli_query($con, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['unique_id'] = $row['unique_id'];
        
        echo 1;
    } else {
        echo "Password or Email incorrect";
    }
} else {
    echo "Please fill in all the fields";
}
?>
