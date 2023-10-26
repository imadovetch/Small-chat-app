<?php 
    session_start();

    if(!isset($_SESSION['unique_id'])){
        header("Location: chat/loginpage.php");
    }
?>

<?php 
    include_once "header.php";
?>
<body>
    <?php 
        include_once "phpfiles/connection.php";
        $user_id = mysqli_real_escape_string($con,$_GET['user_id']);
        $sql = mysqli_query($con,"SELECT * FROM users WHERE unique_id = ($user_id)");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
        }
    ?>
    <div class="contacts-container" >
        <i class=" return fa-solid fa-arrow-left"></i>
        <div class="chatedwith">
            <div class="userchatedwith">
                <img src="images/<?php echo $row['img'] ?>" alt="">
                <div class="usernamestatus">
                <div class="name"><?php echo $row['firstname'] . " " . $row['lastname']; ?></div>
                    <div class="status"><?php echo $row['status'] ?><i class="fa-solid fa-circle"></i></div>
                </div>
            </div>
        </div>
        <div class="conversation">
           
        </div>
        <div class="inputmessage">
            <form action="" method="post" id="message-form">
            <input name="molchiid" type="hidden" value="<?php echo $_SESSION['unique_id']; ?>">
            <input name="getterid" type="hidden" value="<?php echo $user_id; ?>">

                <input class="message" name="message" placeholder="Message" type="text">
                <div class="sendbutton"><i class="fa-solid fa-paper-plane"></i></div>
            </form>
        </div>
    </div>
</body>
<script src="jsfiles/chat.js"></script>

</html>