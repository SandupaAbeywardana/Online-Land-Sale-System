<?php
    session_start();
    $_SESSION["email"] = NULL;
    unset($_SESSION["FirstName"]);
    unset($_SESSION["LastName"]);
    unset($_SESSION["Password"]);
    unset($_SESSION["ProfilePic"]);
    unset($_SESSION["accType"]);

    $_SESSION["UserSignedIn"] = false;
    //$_SESSION["AdminSignedIn"] = false;

    header("Location:../html/login.html");
?>