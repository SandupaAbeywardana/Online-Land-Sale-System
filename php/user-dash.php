<?php
    session_start();
    require('config.php');
    
    $email=$_SESSION["email"];
    $query = "SELECT * from user_accounts where email='".$email."'"; 
    $result = mysqli_query($conn, $query) or die (mysqli_error());
    $row = mysqli_fetch_assoc($result);
?>
<html lang="en">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>

        <link rel="stylesheet" type="text/css" href="../css/user-dash.css">
        
        <link rel="apple-touch-icon" sizes="180x180" href="../images/fav/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../images/fav/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../images/fav/favicon-16x16.png">
        <link rel="shortcut icon" type="Image/jpg" href="../images/fav/favicon-32x32.png">

        <title>User Dashboard | SpringFileds</title>
    </head>
    <body>
        
        <?php
            //session_start();

            /*$abc = $_SESSION["UserSignedIn"];
            echo("<script>console.log('$abc');</script>");

            if($_SESSION["UserSignedIn"] == True){

                $fname = $_SESSION['FirstName'];
                echo("<script>alert ('Welcome $fname')</script>");

            }*/
            /*if($_SESSION["AdminSignedIn"] == True){

                echo('<script>window.location.replace("../php/admin-dash.php");</script>');

            }
            elseif($_SESSION["UserSignedIn"] != True){
                
                echo("<script>alert ('Please Login')</script>");
                echo('<script>window.location.replace("../html/login.html");</script>');

            }*/
        ?>

        <div class="main-container">
            <div class="nav-bar">
                <div class="user-icon">
                    <img src="../images/icons/<?php echo $_SESSION["ProfilePic"] ?>" alt="user icon">
                </div>
                <div class="user-info">
                    <h3><?php echo $_SESSION["FirstName"] ?>&nbsp<?php echo $_SESSION["LastName"] ?></h3>
                    <h5><?php echo $_SESSION["email"] ?></h5>
                </div>
                <div class="menu-components">
                    <hr>
                    <div class="menu-element active" id="nav_settings">
                        <img src="../images/icons/profile.png"  alt="icon">
                        <h2>Account Settings</h2>
                    </div>
                    <hr>
                    <div class="menu-element" id="nav_logout" onclick="logout();">
                            <img src="../images/icons/logout.png"  alt="icon">
                            <h2>Sign Out</h2>
                    </div>
                </div>
            </div>

            <article>
                <div class="content showcontent" id="settings">
                    <h2 class="headsec">Account Settings</h2>
                    <br>
                    <hr>
                    <br>
                    <?php
                        $status = "";
                    
                        if(isset($_POST['new']) && $_POST['new']==1)
                        {
                            $first_Name=$_REQUEST['fname'];
                            $last_Name =$_REQUEST['lname'];
                            $email =$_REQUEST['email'];
                            $update="UPDATE `user_accounts` SET `FirstName`='".$first_Name."',`LastName`='".$last_Name."',`Email`='".$email."' WHERE Email='".$email."'";

                            mysqli_query($conn, $update) or die(mysqli_error());

                            $_SESSION["Email"]=$email;
                            $_SESSION["FirstName"]=$first_Name;
                            $_SESSION["LastName"]=$last_Name; 

                            $status = "Profile Updated Successfully.</br><a href='user-dash.php'><u>Proceed to Profile</u></a>";

                            echo '<p style="color:green; font-size:16px; font-weight: 600;">'.$status.'</p>';
                        }
                        else
                        {
                        ?>
                            <form name="form" method="post" action="">
                                <input type="hidden" name="new" value="1"/>
                                <div class="accsetdet">
                                    <div class="subaccset">
                                        <label>First Name :</label>
                                        <input type="text" name="fname" required value="<?php echo $_SESSION["FirstName"] ?>">
                                    </div>
                                    <div class="subaccset">
                                        <label>Last Name :</label>
                                        <input type="text" name="lname" required value="<?php echo $_SESSION["LastName"] ?>">
                                    </div>
                                    <div class="subaccset">
                                        <label>Email :</label>
                                        <input type="text" name="email" required value="<?php echo $_SESSION["email"] ?>" readonly>
                                    </div>
                                    <input name="submit" type="submit" value="Update" id="update" class="upbtn">
                                </div>
                            </form>
                        <?php } ?>
                    <br>
                    <hr>
                    <br>
                    <form name="formpswd" method="post" action="">
                        <div class="accsetdet">
                            <h3>Change Password</h3>
                            <div class="subaccset">
                                <label for="pwd">Old Password :<span class="required"></span></label>
                                <br>
                                <input type="password" id="pwd" name="pwd" minlength="8" required>
                            </div>
                            <div class="subaccset">
                                <label for="pwd">New Password :<span class="required"></span></label>
                                <br>
                                <input type="password" id="npwd" name="npwd" minlength="8" required>
                            </div>
                            <div class="subaccset">
                                <label for="confirmPwd">Confirm New Password :<span class="required"></span></label>
                                <br>
                                <input type="password" id="confirmPwd" minlength="8" required>
                            </div>
                            <input name="submit" type="submit" value="Change Password" id="chngpass" class="passbtn">
                        </div>
                    </form>
                    <br>
                    <hr>
                    <br>
                    <button onclick="deleteAcc();" id="delete" class="delbtn">DELETE ACCOUNT</button>
                </div>
            </article>

            <div class="logo-display">
                <img src="../images/logo-2.png" alt="logo">
            </div>
        </div>
        <script>
            function deleteAcc(){
                if(confirm("Are you sure you want to delete account?")){
                    window.location.replace("accdelete.php");
                }
            }
        </script>
        <script src='../js/user-dash.js'></script>
    </body>
</html>