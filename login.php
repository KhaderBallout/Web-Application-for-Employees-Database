<?php
    if($_POST){
     session_start();
     $conn = mysqli_connect("localhost","Microsoft","") or die ("could not connect: ". mysqli_error($conn));
     mysqli_select_db($conn,"employees");
     $username= $_POST["username"];
     $password= $_POST["password"];
     $encryption_password = md5($password);
     $query = "SELECT *
     FROM user
     WHERE username = '$username' AND password = '$encryption_password'";
     $result = mysqli_query($conn,$query);
     if(mysqli_num_rows($result) == 1){
        $_SESSION['employees'] = 'true';
        header('location:index2.php');
    }else{
        $failed = 1;
        header("location:index.php?msg=failed");
        }
    }
    ?>