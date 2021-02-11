 <?php
    session_start();
    if(!$_SESSION['employees']){
        header('location:index.html');
    }
    ini_set('memory_limit', '512M');
    set_time_limit(300);
    $conn = mysqli_connect("localhost","Microsoft","") or die ("could not connect: ". mysqli_error($conn));
    mysqli_select_db($conn,"employees");
    if(isset($_POST["show"])){
        if($_POST["n"] == 0){
            $n = 100;
        }else{
            $n = (int)($_POST["n"]);
        }
        $query ="SELECT employees.emp_no, employees.first_name, employees.last_name,salaries.salary ,titles.title,departments.dept_name
        FROM employees , salaries ,titles,dept_emp ,departments
        WHERE employees.emp_no = salaries.emp_no AND dept_emp.emp_no = employees.emp_no AND
        departments.dept_no = dept_emp.dept_no AND titles.emp_no = employees.emp_no AND salaries.to_date = titles.to_date
        LIMIT $n"; 
        $result = mysqli_query($conn,$query); //done
        echo '<br> 
        <div class="container">  
        <div class="table-responsive"> 
        <br />
             <table id="employee_data" class="table table-striped table-bordered">  
                  <thead>  
                       <tr> 
                            <th>Employees Number</th>
                            <th>First Name</th>
                            <th>Last Name</th> 
                            <th>Salary</th>
                            <th>Title</th>
                            <th>Department Name</th>
                       </tr>
                  </thead> 
                  ';
            for ($i=0; $i < mysqli_num_rows($result); $i++) { 
                $row = mysqli_fetch_row($result);
            echo'<tr>
                    <td>'.$row[0].'</td>  
                    <td>'.$row[1].'</td>  
                    <td>'.$row[2].'</td>  
                    <td>'.$row[3].'</td>
                    <td>'.$row[4].'</td>
                    <td>'.$row[5].'</td>    
                </tr>';
        }
      
    }
    if(isset($_POST["show2"])){
        $query ="SELECT * FROM departments"; 
        $result = mysqli_query($conn,$query); //done
        echo '<br> 
        <div class="container">  
        <div class="table-responsive"> 
        <br />
             <table id="employee_data" class="table table-striped table-bordered">  
                  <thead>  
                       <tr>  
                            <th>Department number</th>
                            <th>Department name</th> 
                       </tr>
                  </thead> 
                  ';
            for ($i=0; $i < mysqli_num_rows($result); $i++) { 
                $row = mysqli_fetch_row($result);
            echo'<tr>
                    <td>'.$row[0].'</td>  
                    <td>'.$row[1].'</td>  
                </tr>';
        }
      
    }
    if(isset($_POST["search"])){
        $first=$_POST["first"];
        $last=$_POST["last"];
        if($first != "" && $last != ""){
            $query = "SELECT *
            FROM employees
            WHERE employees.first_name = '$first' AND employees.last_name = '$last'";
        }else{
            $query = "SELECT *
            FROM employees
            WHERE employees.first_name = '$first' OR employees.last_name = '$last'";
        }
        $result = mysqli_query($conn,$query);
        echo ' <div class="container">  
        <br />
        <div class="table-responsive">  
        <table id="employee_data" class="table table-striped table-bordered">  
                  <thead>  
                  <tr>  
                       <th>Employees Number</th>
                       <th>Birth Date</th> 
                       <th>First Name</th>
                       <th>Last Name</th>
                       <th>Gender</th>
                       <th>Hire Date</th>
                       </tr>
                       </thead> 
                       ';
            for ($i=0; $i < mysqli_num_rows($result); $i++) { 
                $row = mysqli_fetch_row($result);
            echo'<tr>
                    <td>'.$row[0].'</td>  
                    <td>'.$row[1].'</td>  
                    <td>'.$row[2].'</td>  
                    <td>'.$row[3].'</td>
                    <td>'.$row[4].'</td>
                    <td>'.$row[5].'</td>  
                </tr>';
        }
      echo '</table>  </div> </div>';
    }
    if(isset($_POST["dept_name"])){
        if($_POST["n1"] == 0){
            $n1 = 100;
        }else{
            $n1 = (int)($_POST["n1"]);
        }
        $department_name=$_POST["department_name"];
        $query = "SELECT employees.emp_no, employees.first_name, employees.last_name,departments.dept_no
        FROM employees , salaries,dept_emp ,departments
        WHERE departments.dept_name = '$department_name' AND dept_emp.emp_no = employees.emp_no AND
        departments.dept_no = dept_emp.dept_no AND salaries.to_date = dept_emp.to_date AND salaries.emp_no = employees.emp_no 
        LIMIT $n1"; 
        $result = mysqli_query($conn,$query);
        echo ' <div class="container">  
        <br />
        <div class="table-responsive">  
             <table id="employee_data" class="table table-striped table-bordered">  
                  <thead>  
                       <tr>  
                       <th>Employees Number</th>
                       <th>First Name</th>
                       <th>Last Name</th>
                       <th>Department number</th>
                       </tr>
                  </thead> 
                  ';
            for ($i=0; $i < mysqli_num_rows($result); $i++) { 
                $row = mysqli_fetch_row($result);
            echo'<tr>
                    <td>'.$row[0].'</td>  
                    <td>'.$row[1].'</td>  
                    <td>'.$row[2].'</td>  
                    <td>'.$row[3].'</td>
                </tr>';
        }
    }
    if(isset($_POST["titles"])){
        if($_POST["n2"] == 0){
            $n2 = 100;
        }else{
            $n2 = (int)($_POST["n2"]);
        }
        $title=$_POST["title"];
        $query= "SELECT DISTINCT employees.emp_no,birth_date,first_name,last_name,gender,hire_date
        FROM `employees`,titles,dept_emp 
        WHERE titles.title = '$title' AND employees.emp_no = titles.emp_no AND dept_emp.to_date = titles.to_date
        LIMIT $n2";
        $result = mysqli_query($conn,$query);
        echo ' <div class="container">  
        <br />
        <div class="table-responsive">  
             <table id="employee_data" class="table table-striped table-bordered">  
                  <thead>  
                    <tr>  
                        <th>Employees Number</th>
                        <th>Birth Date</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Hire Date</th>
                    </tr>
                  </thead> 
                  ';
            for ($i=0; $i < mysqli_num_rows($result); $i++) { 
                $row = mysqli_fetch_row($result);
            echo'<tr>
                    <td>'.$row[0].'</td>  
                    <td>'.$row[1].'</td>  
                    <td>'.$row[2].'</td>  
                    <td>'.$row[3].'</td>
                    <td>'.$row[4].'</td>  
                    <td>'.$row[5].'</td>
                </tr>';
        }
    }
    if(isset($_POST["salaries"])){
        if($_POST["n3"] == 0){
            $n3 = 100;
        }else{
            $n3 = (int)($_POST["n3"]);
        }
        if($_POST["s1"] == 0){
            $s1 = 65000;
        }else{
            $s1 = (int)($_POST["s1"]);
        }
        if($_POST["s2"] == 0){
            $s2 = 70000;
        }else{
            $s2 = (int)($_POST["s2"]);
        }
        if($s1 > $s2){
            $temp = $s1;
            $s1 = $s2;
            $s2 = $temp;
        }
        $query = "SELECT employees.first_name, employees.last_name, MAX(salaries.salary)
        FROM employees , salaries 
        WHERE employees.emp_no = salaries.emp_no
        GROUP BY employees.emp_no
        HAVING  MAX(salaries.salary) BETWEEN $s1 AND $s2
        LIMIT $n3"; 
        $result = mysqli_query($conn,$query);
        echo ' <div class="container">  
        <br />
        <div class="table-responsive">  
             <table id="employee_data" class="table table-striped table-bordered">  
                  <thead>  
                    <tr>  
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Salary</th>
                    </tr>
                  </thead> 
                  ';
            for ($i=0; $i < mysqli_num_rows($result); $i++) { 
                $row = mysqli_fetch_row($result);
            echo'<tr>
                    <td>'.$row[0].'</td>  
                    <td>'.$row[1].'</td>  
                    <td>'.$row[2].'</td>  
                </tr>';
        }
    }
    if(isset($_POST["departments"])){
        $query = "SELECT dept_name,employees.emp_no,first_name,last_name
         FROM departments, employees , dept_manager
         WHERE departments.dept_no = dept_manager.dept_no AND employees.emp_no = dept_manager.emp_no AND dept_manager.to_date = '9999-01-01'";
        $result = mysqli_query($conn,$query);
        echo ' <div class="container">  
        <br />
        <div class="table-responsive">  
             <table id="employee_data" class="table table-striped table-bordered">  
                  <thead>  
                    <tr>  
                    <th>Department Name</th>
                    <th>Employees Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    </tr>
                  </thead> 
                  ';
            for ($i=0; $i < mysqli_num_rows($result); $i++) { 
                $row = mysqli_fetch_row($result);
            echo'<tr>
                    <td>'.$row[0].'</td>  
                    <td>'.$row[1].'</td>  
                    <td>'.$row[2].'</td>
                    <td>'.$row[3].'</td>  
                </tr>';
        }
    }
    if(isset($_POST["dept_salary"])){
        $query = "SELECT departments.dept_name,departments.dept_no, SUM(salaries.salary) 
        FROM departments ,dept_emp ,salaries
        WHERE dept_emp.dept_no = departments.dept_no AND dept_emp.emp_no = salaries.emp_no AND salaries.to_date = dept_emp.to_date 
        GROUP BY dept_emp.dept_no"; //
        $result = mysqli_query($conn,$query);
        echo ' <div class="container">  
        <br />
        <div class="table-responsive">  
             <table id="employee_data" class="table table-striped table-bordered">  
                  <thead>  
                    <tr>  
                    <th>Department Name</th>
                    <th>Department Number</th>
                    <th>SUM salary</th>
                    </tr>
                  </thead> 
                  ';
            for ($i=0; $i < mysqli_num_rows($result); $i++) { 
                $row = mysqli_fetch_row($result);
            echo'<tr>
                    <td>'.$row[0].'</td>  
                    <td>'.$row[1].'</td>  
                    <td>'.$row[2].'</td> 
                </tr>';
        }
    }
    // if(isset($_POST["search_departments"])){
    //     if($_POST["n4"] == 0){
    //         $n4 = 100;
    //     }else{
    //         $n4 = (int)($_POST["n4"]);
    //     }
    //     $department_name=$_POST["department_names"];
    //     $query = "SELECT employees.first_name , employees.last_name 
    //     FROM employees, departments , dept_emp,salaries
    //     WHERE dept_name = '$department_name' AND dept_emp.emp_no = employees.emp_no AND departments.dept_no = dept_emp.dept_no AND salaries.to_date = dept_emp.to_date AND salaries.emp_no = employees.emp_no
    //     LIMIT $n4";
    //     $result = mysqli_query($conn,$query); // DONE
    //     echo ' <div class="container">  
    //     <br />
    //     <div class="table-responsive">  
    //          <table id="employee_data" class="table table-striped table-bordered">  
    //               <thead>  
    //                 <tr>  
    //                 <th>First_name</th>
    //                 <th>Last_name</th>
    //                 </tr>
    //               </thead> 
    //               ';
    //         for ($i=0; $i < mysqli_num_rows($result); $i++) { 
    //             $row = mysqli_fetch_row($result);
    //         echo'<tr>
    //                 <td>'.$row[0].'</td>  
    //                 <td>'.$row[1].'</td>  
    //             </tr>';
    //     }
    // }
    mysqli_close($conn);
    ?>