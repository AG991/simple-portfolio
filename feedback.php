<?php
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $comment=$_POST['comment'];

    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="agcv";

    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if(mysqli_connect_error())
    {
        die('connect error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
    else
    {
        $INSERT="INSERT INTO feedback(`fname`,`email`,`comment`)values(?,?,?)";
        $stmt=$conn->prepare($INSERT);
        $stmt->bind_param("sss", $fname, $email, $comment); 
        $stmt->execute();
        echo '<script type="text/javascript">';
        echo 'alert("Your feedback has been submitted !");';
        echo 'window.location.href = "index.html";';
        echo '</script>';
        $stmt->close();
        $conn->close();
    }
?>