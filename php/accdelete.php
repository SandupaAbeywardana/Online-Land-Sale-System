<?php
    session_start();
    require('config.php');
    $email=$_SESSION['email'];
    $query = "DELETE FROM `user_accounts` WHERE `Email`='".$email."'"; 
    $result = mysqli_query($conn,$query) or die ( mysqli_error());

    header("Location: ../html/login.html");
?>