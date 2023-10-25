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
    $sql = mysqli_query($con, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");
    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
    }
?>

    <div class="contacts-container" >
        <div class="owner">
            <div class="user">
                <img src="images/<?php echo $row ['img']; ?> " alt="">
                <div class="usernamestatus">
                    <div class="name"><?php  echo $row['firstname'] . " ". $row['lastname']; ?></div>
                    <div class="status"><?php echo $row['status']; ?> <i class="fa-solid fa-circle"></i></div>
                </div>
            </div>
            <button class="disconnect-button">Disconnect</button>
        </div>
        <div class="contacts-title">Available Contacts</div>
        <div class="chaters">
        
            <a style="text-decoration: none;" href=""><div class="user">
                <img src="images/download.jpg" alt="">
                <div class="usernamestatus">
                    <div class="name">imad bouderoua</div>
                    <div class="status">online <i class="fa-solid fa-circle"></i></div>
                </div>
            </div></a>
           
        </div>

    </div>
</body>
<script src="jsfiles/user.js"></script>
</html>
<script>
    
// khrejf7alek

const disconnectButton = document.querySelector('.disconnect-button');
    
    disconnectButton.addEventListener('click', function () {
        // Send an AJAX request to log out
        console.log("twrkat");
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'phpfiles/logout.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                window.location.href = 'loginpage.php';
            }
        };
        xhr.send();
    });
</script>