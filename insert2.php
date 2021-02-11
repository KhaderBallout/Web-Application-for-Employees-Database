<?php
   session_start();
   if(!$_SESSION['employees']){
       header('location:index.php');
   }
   $conn = mysqli_connect("localhost","Microsoft","") or die ("could not connect: ". mysqli_error($conn));
   mysqli_select_db($conn,"employees");
	if($_POST){
        //$DNO=$_POST['DNO'];
        $DN=$_POST['DN'];
        $query = 'SELECT * FROM `departments` ORDER BY `departments`.`dept_no` DESC';
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($result);
        $id = $row[0];
        $add = $id[1]. $id[2] . $id[3] ; 
        $number = (int)$add;
        $number +=1;
        $emp_no = "d0".$number;
        $sql = "INSERT INTO departments VALUES ('$emp_no','$DN')";
        if (mysqli_query($conn, $sql)) {
            header("location:index2.php?msg=addDep");
            $_SESSION['counter1'] = 1;
        } else {
           $_SESSION['counter2'] = 1;
            header("location:index2.php?msg=duplicate");
            }  
    }
    ?>