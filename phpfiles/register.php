<?php
include_once "connection.php";
session_start();
$password = mysqli_real_escape_string($con, $_POST['password']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$lastname = mysqli_real_escape_string($con, $_POST['last-name']);
$firstname = mysqli_real_escape_string($con, $_POST['first-name']);

if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $sql = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($sql) > 0) {
            echo $email . ": This email is already used";
        } else {
            if (isset($_FILES['photo'])) {
                $img_name = $_FILES['photo']['name'];
                $img_type = $_FILES['photo']['type'];
                $tmp_name = $_FILES['photo']['tmp_name'];

                $img_exploide = explode('.', $img_name);
                $img_ext = end($img_exploide);

                $extensions = ['png', 'jpeg', 'jpg'];
                if (in_array($img_ext, $extensions) === true) {
                    $time = time();
                    $new_img_name = $time . $img_name;

                    if (move_uploaded_file($tmp_name, "../images/" . $new_img_name)) {
                        $status = "online now";
                        $uniqueid = rand(time(), 10000000);

                        $stmt = $con->prepare("INSERT INTO users (unique_id, firstname, lastname, email, password, img, status) VALUES (?, ?, ?, ?, ?, ?, ?)");
                        $stmt->bind_param("sssssss", $uniqueid, $firstname, $lastname, $email, $password, $new_img_name, $status);
                        
                        // Check for errors during insert
                        if ($stmt->execute()) {
                            $sql3 = mysqli_query($con,"SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($sql3) > 0)
                            {
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "dkchinadi";
                            }
                        } else {
                            echo "Something went wrong, please retry later";
                        
                        }
                    } else {
                        echo "Failed to move uploaded file";
                    }
                } else {
                    echo "Invalid photo format";
                }
            } else {
                echo "Please upload a photo";
            }
        }
    } else {
        echo "Please enter a valid email";
    }
} else {
    echo "Please fill in all the fields";
}
?>
