<!--logout session-->
<?php
 session_start();
if(isset($_SESSION['id'])){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['email']);
    echo "You are logout successfully";
    echo "<a href='index.php'>Click here to login again</a>";
}

?>