<?php
   session_start();
   if(!$_SESSION['employees']){
       header('location:index.php');
   }
   $conn = mysqli_connect("localhost","Microsoft","") or die ("could not connect: ". mysqli_error($conn));
   mysqli_select_db($conn,"employees");
	if($_POST){
        $query = 'SELECT * FROM `employees` ORDER BY `emp_no` DESC LIMIT 1';
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($result);
        $id = (int)$row[0];
        $id +=1;
        $DOF=$_POST['DOF'];
        $First_Name=$_POST['FN'];
        $Last_Name=$_POST['LN'];
        $Gender=$_POST['G'];
        $HireDate=$_POST['HD'];
       
        $sql = "INSERT INTO employees VALUES ('$id','$DOF','$First_Name','$Last_Name','$Gender','$HireDate')";
        if (mysqli_query($conn, $sql)) {
            header("location:index2.php?msg=addEmp");
            $_SESSION['counter'] = 1;
        }else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }  
    }
    mysqli_close($conn);
?>