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
        <div class="contacts-grps">
            <div id="individuel" class="contacts-title">Available Contacts</div>
            <div id="groups" class="contacts-title">Available Groups</div>
        </div>
        <div class="groupscontainer">
                <button class="addgroup">Add</button>
                <div class="group-input" style="display: none;">
                         <form action="" method="post" id="group-form">
                             <label for="group-name">Name the group</label>
                                <input name="getterid"  type="text" id="group-name">
                        </form>
                </div>
                <div class="chatersgroupes">
                    <div class="groupchat"><img src="" alt="">groupe 1</div></a>
                    <div class="groupchat"><img src="" alt="">groupe2</div>
                    <div class="groupchat"><img src="" alt="">groupe 1</div>
                    <div class="groupchat"><img src="" alt="">groupe2</div>
                </div>
        </div>

        <div class="chaters">
        
        </div>

    </div>
</body>
<script ></script>
<script src="jsfiles/chatgrps.js"></script>
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