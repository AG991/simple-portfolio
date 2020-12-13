<?php
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $message=$_POST['message'];

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
        $INSERT="INSERT INTO message(`fname`,`lname`,`email`,`phone`,`message`)values(?,?,?,?,?)";
        $stmt=$conn->prepare($INSERT);
        $stmt->bind_param("sssds", $fname, $lname, $email, $phone, $message); 
        $stmt->execute();
        echo '<script type="text/javascript">';
        echo 'alert("Your message has been submitted !");';
        echo 'window.location.href = "index.html";';
        echo '</script>';
        //window.history.go(-1);
        //header("location:index.html");
        $stmt->close();
        $conn->close();
    }
?>