<?php
    include 'config.php';
    $ContactName = $_POST['cnname'];
    $ContactPhone = $_POST['cnphone'];
    $ContactEmail = $_POST['cnemail'];
    $ContactMessage = $_POST['cnmessage'];


    $update = "INSERT INTO contact_form(cName, cPhone, cEmail, cMessage) VALUES('$ContactName', '$ContactPhone', '$ContactEmail', '$ContactMessage')";
    if(mysqli_query($conn, $update))
    {
        echo("<script type= 'text/javascript'>alert('Message sent successfully!')</script>");
        echo("<script>window.location.replace('../html/contact.html');</script>");


    }
    else{
        echo "Error : ". mysqli_error($conn);

    }
    mysqli_close($conn);


?>