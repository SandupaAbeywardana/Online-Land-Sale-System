<?php

// Create connection

session_start();

if(isset($_POST['save']))
{
    extract($_POST);

    include 'config.php';

    $email=$_POST['email']; 
    $password=$_POST['password'];

    $sql=mysqli_query($conn,"SELECT * FROM user_accounts where Email='$email' and user_Password='$password'");
    $row  = mysqli_fetch_array($sql);

    if(is_array($row))
    {
        //saving acc details
        $_SESSION["email"]=$row['Email'];
        $_SESSION["FirstName"]=$row['FirstName'];
        $_SESSION["LastName"]=$row['LastName']; 
        $_SESSION["Password"]=$row['user_Password']; 
        $_SESSION["ProfilePic"] = $row['ProfilePic'];
        $_SESSION["accType"] = $row['AccType'];

        $_SESSION["UserSignedIn"] = true;
        echo('<script>window.location.replace("../php/user-dash.php");</script>');

        /*if($_SESSION["accType"] == 'USER'){
            $_SESSION["UserSignedIn"] = true;
            echo('<script>window.location.replace("../php/user-dash.php");</script>');
        }
        elseif($_SESSION["accType"] == 'ADMIN'){
            $_SESSION["AdminSignedIn"] = true;
            echo('<script>window.location.replace("../php/admin-dash.php");</script>');
        }*/
    }
    else
    {
        $_SESSION["UserSignedIn"] = false;
        //$_SESSION["AdminSignedIn"] = false;

        echo("<script>alert ('Invalid Email ID/Password')</script>");
        echo('<script>window.location.replace("../html/login.html");</script>');
    }
}

?>