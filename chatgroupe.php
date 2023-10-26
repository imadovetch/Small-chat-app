<?php 
    session_start();

    if(!isset($_SESSION['unique_id'])){
        header("Location: loginpage.php");
    }
?>

<?php 
    include_once "header.php";
?>
<body>
    <?php 
        include_once "phpfiles/connection.php";
        // Assuming you've established a database connection already
$groupe_id = mysqli_real_escape_string($con, $_GET['groupe_id']);

// Use a prepared statement to retrieve the group information
$stmt = $con->prepare("SELECT * FROM groupes WHERE id = ?");
$stmt->bind_param("i", $groupe_id); // "i" stands for integer; adjust if necessary
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();


if ($row) {
    // Your code to display group information
} else {
    // Handle the case where the group doesn't exist
}

$stmt->close();

    ?>
    <div class="contacts-container" >
        <i class=" return fa-solid fa-arrow-left"></i>
        <div class="chatedwith">
        <div class="userchatedwith">
                <img src="images/3670297.png" alt="">
                
                <div class="name"><?php echo $row['name']?></div>
                 
            </div>
        </div>
        <div class="conversation">
           
        </div>
        <div class="inputmessage">
            <form action="" method="post" id="message-form">
            <input name="molchiid" type="hidden" value="<?php echo $_SESSION['unique_id']; ?>">
            <input name="parentid" type="hidden" value="<?php echo $groupe_id; ?>">

                <input class="message" name="message" placeholder="Message" type="text">
                <div class="sendbutton"><i class="fa-solid fa-paper-plane"></i></div>
            </form>
        </div>
    </div>
</body>
<script src="jsfiles/chatgroupemsg.js"></script>

</html>