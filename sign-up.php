<?php
 if($_POST){
    session_start();
    $conn = mysqli_connect("localhost","Microsoft","") or die ("could not connect: ". mysqli_error($conn));
    mysqli_select_db($conn,"employees");
    $username= $_POST["email"];
    $password= $_POST["password"];
    $encryption_password = md5($password);
    $query = "INSERT INTO `user`(`username`, `password`) VALUES ('$username','$encryption_password')";
    $result = mysqli_query($conn,$query);
    $test = mysqli_affected_rows($conn);
    if($test== 1){
       $_SESSION['employees'] = 'true';
       header('location:index.php?msg=addEmail');
      //  $_SESSION['counter4'] = 1;
       }else{
          header('location:index.php?msg=failedEmail');
      //     $_SESSION['counter3'] = 1;
       }
   }
   ?> 