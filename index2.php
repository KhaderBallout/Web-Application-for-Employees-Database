<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <link rel="icon"  href="employee.png" sizes="16x16">
    <title>GK</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <link rel="stylesheet" href="https://gitcdn.link/repo/Chalarangelo/mini.css/master/dist/mini-default.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="css3.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script src="cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js"></script>
    <script src="cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/css/bootstrapvalidator.min.css"></script>
</head>

<body>
    <?php
    session_start();
    if(!$_SESSION['employees']){
        header('location:index.php');
    }
    ?>
    <?php 
            if (isset($_GET["msg"]) && $_GET["msg"] == 'addEmp' && $_SESSION['counter']==1) {
            echo '<script>alert("Added a employee successfully")</script>';
            $_SESSION['counter'] = 2;
            }
        ?>
    <?php 
            if (isset($_GET["msg"]) && $_GET["msg"] == 'addDep' && $_SESSION['counter1']==1) {
            echo '<script>alert("Added a department successfully")</script>';
            $_SESSION['counter1'] = 2;
            }
        ?>
    <?php 
            if (isset($_GET["msg"]) && $_GET["msg"] == 'duplicate' && $_SESSION['counter2']==1) {
            echo '<script>alert("duplicate department name")</script>';
            $_SESSION['counter2'] = 2;
            }
        ?>
    <header>
        <div class="left_area">
            <h3>GK <span>TEAM</span></h3>

        </div>
        <div class="right_area">
            <a href="signout.php" class="logout_btn">Logout</a>
        </div>

    </header>
    <div class="sidebar">
        <div style="padding-left: 50px">
            <img src="employee.png" class="profile_image" alt="">
        </div>
        <a href="#" style="margin-top: 30px"><i class="fas fa-desktop"></i><span>Dashboard</span></a>



    </div>


    <div class="content" style="padding-top: 60px">
        <fieldset>
        <div class="input-group">
                <a href="#addEmployeeModal" class="btn"
                    style="margin-left: 50px;  background-color: #19B3D3; color: black" data-toggle="modal"><i
                        class="material-icons"></i> <span>Add New User</span></a>
            </div>
            <!-- <legend>Simple form</legend> -->
            <div class="input-group" style="height: 60px; margin-top: 15px">
                <input type="submit" id="show" name="show" value="show employees"
                    style="margin-left: 98px; background-color: #19B3D3"></input>
            </div>
            <div class="input-group" style="height: 60px; margin-top: 15px">
                <input type="number" id="n" name="n" min="1" placeholder="Number of employees"
                    style="margin-left: 50px;" title="Default number of rows is 100"></input>
            </div>
            <!-- <div class="input-group">
                <input type="submit" id="show2" name="show2" value="show all departments"
                    style="margin-left: 50px; ; background-color: #19B3D3"></input>
            </div> -->
            
            <!-- <div class="input-group">
                <a href="#addDepartment" class="btn"
                    style="margin-left: 50px; ; background-color: #19B3D3 ; color: black" data-toggle="modal"><i
                        class="material-icons"></i> <span>Add New Department</span></a>
            </div> -->
        </fieldset>
        <fieldset>
            <!-- <legend>Simple form</legend> -->
            <!-- <div class="input-group" style="height: 60px; margin-top: 15px">
                <input type="submit" id="show" name="show" value="show employees"
                    style="margin-left: 50px; background-color: #19B3D3"></input>
            </div>
            <div class="input-group" style="height: 60px; margin-top: 15px">
                <input type="number" id="n" name="n" min="1" placeholder="Default # of rows 100"
                    style="margin-left: 50px;" title="Default row is 100"></input>
            </div> -->
            <div class="input-group">
                <a href="#addDepartment" class="btn"
                    style="margin-left: 50px; ; background-color: #19B3D3 ; color: black" data-toggle="modal"><i
                        class="material-icons"></i> <span>Add New Department</span></a>
            </div>
            <div class="input-group">
                <!-- <label for="show all">To show all employees</label> -->
                <input type="submit" id="show2" name="show2" value="show all departments"
                    style="margin-left: 50px; ; background-color: #19B3D3"></input>
            </div>
            <!-- <div class="input-group">
                <a href="#addEmployeeModal" class="btn"
                    style="margin-left: 50px;  background-color: #19B3D3; color: black" data-toggle="modal"><i
                        class="material-icons"></i> <span>Add New User</span></a>
            </div> -->
           
        </fieldset>


        <!-- ////////////////////////////////////////////////////////////////// -->


        <fieldset>
            <!-- <legend>Simple form</legend> -->
            
            <div class="input-group">
                <label for="first">First name</label>
                <input type="text" id="first" placeholder="First Name" name="first" pattern="[a-zA-Z]+" >
            </div>
            <div class="input-group">
                <label for="last">Last name</label>
                <input type="text" id="last" placeholder="Last Name" name="last" pattern="[a-zA-Z]+" >
            </div>
            <input type="submit" id="search" name="search" value="search for employees"></input><br>
            
        </fieldset>

        <!-- ////////////////////////////////////////////////////////////////// -->
        <?php 
      $conn = mysqli_connect("localhost","Microsoft","") or die ("could not connect: ". mysqli_error($conn));
      mysqli_select_db($conn,"employees");
      $query ="SELECT dept_name FROM `departments` WHERE 1"; 
      $result = mysqli_query($conn,$query);
      ?>
        <fieldset>
            <!-- <legend>Simple form</legend> -->
            <div class="input-group">
                <label for="department">Search for employees by department name</label>
                <!-- <input type="text" id="department_name" name="department_name" placeholder="Department name"> -->
                <select name="operation" id="department_name">
                <option selected="true" disabled="disabled">Choose a Department</option>
                <?php while($row = mysqli_fetch_array($result)):;?>
                <option value="<?php echo $row[0] ?>"><?php echo $row[0];?></option>
                <?php endwhile;?>
                    <!-- <option  value="Customer Service">Customer Service</option>
                    <option  value="Research">Research</option>
                    <option  value="Sales">Sales </option>
                    <option  value="Quality Management">Quality Management</option>
                    <option  value="Development"> Development</option>
                    <option  value="Production">Production </option>
                    <option  value="Human Resources">Human Resources </option>
                    <option  value="Finance">Finance </option>
                    <option  value="Marketing"> Marketing</option> -->
                </select>
                <input type="number" id="n1" name="n1" min="1" placeholder="Number of employees" title="Default number of rows is 100"
                    style="margin-left: 10px; "></input>
                <input type="submit" id="dept_name" name="dept_name" value="search"></input>
                
            </div>
        </fieldset>

        <!-- ////////////////////////////////////////////////////////////////// -->

        <fieldset>
            <!-- <legend>Simple form</legend> -->
            <div class="input-group">
                <label for="salary">Show all employees salary Between</label>
                <input type="number" id="s1" name="s1" placeholder="First Salary" title="Default Value 65000 " style="margin-left: 10px; "></input>
                <input type="number" id="s2" name="s2" placeholder="Second Salary" title = "Default Value 70000"style="margin-left: 10px; "></input>
                <input type="number" id="n3" name="n3" min="1" placeholder="Number of employees" title="Default number of rows is 100"
                    style="margin-left: 10px; "></input>
                <input type="submit" id="salaries" name="salaries" value="search"></input>
                
            </div>
        </fieldset>


        <!-- ////////////////////////////////////////////////////////////////// -->

        <fieldset>
            <!-- <legend>Simple form</legend> -->
            <div class="input-group">
                <label for="dept">Show all departments along with their managers</label>
                <input type="submit" id="departments" name="departments" value="show"></input>
            </div>
        </fieldset>

        <!-- ////////////////////////////////////////////////////////////////// -->

        <fieldset>
            <!-- <legend>Simple form</legend> -->
            <div class="input-group">

                <label for="dept_salary">Show departments’ names with the amount of employees’ salaries </label>
                <input type="submit" name="dept_salary" id="dept_salary" value="show"></input><br>
            </div>
        </fieldset>

        <fieldset>
            <!-- <legend>Simple form</legend> -->
            <div class="input-group">
                <label for="title">Search for employees by job title</label>
                <!-- <input type="text" name="title" id="title" placeholder="title"> -->
                <select name="operation" id="title">
                <option selected="true" disabled="disabled">Choose a title</option> 
                    <option  value="Senior Engineer">Senior Engineer</option>
                    <option  value="Staff">Staff</option>
                    <option  value="Engineer">Engineer </option>
                    <option  value="Senior Staff">Senior Staff</option>
                    <option  value="Assistant Engineer">Assistant Engineer</option>
                    <option  value="Technique Leader">Technique Leader</option>
                    <option  value="Manager">Manager</option>
                </select>
                <input type="number" id="n2" name="n2" min="1" placeholder="Number of employees" title="Default number of rows is 100"
                    style="margin-left: 10px; "></input>
                <input type="submit" name="titles" id="titles" value="search"></input>
               <br>
            </div>
        </fieldset>
        <!-- <fieldset> -->
            <!-- <legend>Simple form</legend> -->
            <!-- <div class="input-group">
                <label for="department_name">department_name</label>
                <input type="text" id="department_names" name="department_names" placeholder="Department name">
                <input type="submit" id="search_departments" name="search_departments"
                    value="search for employees"></input>
                <input type="number" id="n4" name="n4" min="1" placeholder="Number of Rows"
                    style="margin-left: 10px; "></input><br>
            </div> -->
        <!-- </fieldset> -->
        <div id="res">

        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="user_form" role="form" method="POST" action="insert1.php">
                    <div class="modal-header">
                        <h4 class="modal-title">Add User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>

                    <div class="modal-body">
                        <div class="form-group">
                            <label>DateOfBirth</label>
                            <input type="date" name="DOF" id="DOF" class="form-control" pattern="\d{4}-\d{0,1}-\d{1,2}"
                                placeholder="yyyy-mm-dd" required />
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="FN" id="FN" class="form-control" placeholder="First Name"
                            pattern="[a-zA-Z]+" oninput="this.setCustomValidity('')"  required />
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="LN" id="LN" class="form-control" placeholder="Last Name"
                            pattern="[a-zA-Z]+" oninput="this.setCustomValidity('')" required />
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <!-- <input type="text" name="G" id="G" class="form-control" pattern="M|F"
                                placeholder="M OR F" oninvalid="this.setCustomValidity('Only F OR M')" oninput="this.setCustomValidity('')" required /> -->
                                <select name="G" id="G" required>
                                    <option value="">None</option> 
                                    <option value="F">F</option>
                                    <option value="M">M</option>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>Hire Date</label>
                            <input type="date" name="HD" id="HD" class="form-control" pattern="\d{4}-\d{1,2}-\d{1,2}"
                                placeholder="yyyy-mm-dd" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="1" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="add" value="Add" class="btn btn-success" id="add"></input>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addDepartment" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="department_form" method="POST" action="insert2.php">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Departments</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <!-- <div class="form-group">
                            <label>dept_no</label>
                            <input type="text" name="DNO" id="DNO" class="form-control" pattern="[d][0-9]{3}" placeholder="d100" oninvalid="this.setCustomValidity('Should start with d and followed by 3 number')" required>
                        </div> -->
                        <div class="form-group">
                            <label>Department Name</label>
                            <input type="text" name="DN" id="DN" class="form-control" placeholder="Department name"
                            pattern="[a-zA-Z]+"   oninvalid="this.setCustomValidity('Enter only letters')" oninput="this.setCustomValidity('')" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" value="1" name="type">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="dep" value="Add" class="btn btn-success" id="BD"></input>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script>
$(document).ready(function() {
    $("#show").click(function() {
        $.post(
            "DataBase.php", {
                "show": $("#show").val(),
                "n": $("#n").val(),
            },
            function(data, status) {
                $("#n1").val("");
                $("#n2").val("");
                $("#n3").val("");
                $("#n4").val("");
                $("#s1").val("");
                $("#s2").val("");
                $("#first").val("");
                $("#last").val("");
                $("#department_name").val("Choose a Department");
                $("#title").val("Choose a title");
                $("#department_names").val("");
                $("#res").html(data);
                $('#employee_data').DataTable({
                    "destroy": true, //use for reinitialize datatable
                });

            }
        );
    })
})
</script>
<script>
$(document).ready(function() {
    $("#show2").click(function() {
        $.post(
            "DataBase.php", {
                "show2": $("#show2").val(),
            },
            function(data, status) {
                $("#n").val("");
                $("#n1").val("");
                $("#n2").val("");
                $("#n3").val("");
                $("#n4").val("");
                $("#s1").val("");
                $("#s2").val("");
                $("#first").val("");
                $("#last").val("");
                $("#department_name").val("Choose a Department");
                $("#title").val("Choose a title");
                // $("#department_names").val("");
                $("#res").html(data);
                $('#employee_data').DataTable({
                    "destroy": true, //use for reinitialize datatable
                });

            }
        );
    })
})
</script>
<script>
$(document).ready(function() {
    $("#search").click(function() {
        $.post(
            "DataBase.php", {
                "search": $("#search").val(),
                "first": $("#first").val(),
                "last": $("#last").val(),
            },
            function(data, status) {
                $("#n").val("");
                $("#n1").val("");
                $("#n2").val("");
                $("#n3").val("");
                $("#n4").val("");
                $("#s1").val("");
                $("#s2").val("");
                $("#department_name").val("Choose a Department");
                $("#title").val("Choose a title");
                //$("#department_names").val("");
                $("#res").html(data);
                $('#employee_data').DataTable({
                    "destroy": true, //use for reinitialize datatable
                });
            }
        );
    })
})
</script>
<script>
$(document).ready(function() {
    $("#dept_name").click(function() {
        $.post(
            "DataBase.php", {
                "dept_name": $("#dept_name").val(),
                "department_name": $("#department_name").val(),
                "n1": $("#n1").val(),
            },
            function(data, status) {
                $("#n").val("");
                $("#n2").val("");
                $("#n3").val("");
                $("#n4").val("");
                $("#s1").val("");
                $("#s2").val("");
                $("#first").val("");
                $("#last").val("");
                $("#title").val("Choose a title");
               // $("#department_names").val("");
                $("#res").html(data);
                $('#employee_data').DataTable({
                    "destroy": true, //use for reinitialize datatable
                });
            }
        );
    })
})
</script>
<script>
$(document).ready(function() {
    $("#titles").click(function() {
        $.post(
            "DataBase.php", {
                "titles": $("#titles").val(),
                "title": $("#title").val(),
                "n2": $("#n2").val(),
            },
            function(data, status) {
                $("#n").val("");
                $("#n1").val("");
                $("#n3").val("");
                $("#n4").val("");
                $("#s1").val("");
                $("#s2").val("");
                $("#first").val("");
                $("#last").val("");
                $("#department_name").val("Choose a Department");
              //  $("#department_names").val("");
                $("#res").html(data);
                $('#employee_data').DataTable({
                    "destroy": true, //use for reinitialize datatable
                });
            }
        );
    })
})
</script>
<script>
$(document).ready(function() {
    $("#salaries").click(function() {
        $.post(
            "DataBase.php", {
                "salaries": $("#salaries").val(),
                "s1": $("#s1").val(),
                "s2": $("#s2").val(),
                "n3": $("#n3").val(),
            },
            function(data, status) {
                $("#n").val("");
                $("#n1").val("");
                $("#n2").val("");
                $("#n4").val("");
                $("#first").val("");
                $("#last").val("");
                $("#department_name").val("Choose a Department");
                $("#title").val("Choose a title");
               // $("#department_names").val("");
                $("#res").html(data);
                $('#employee_data').DataTable({
                    "destroy": true, //use for reinitialize datatable
                });

            }
        );
    })
})
</script>
<script>
$(document).ready(function() {
    $("#departments").click(function() {
        $.post(
            "DataBase.php", {
                "departments": $("#departments").val(),
            },
            function(data, status) {
                $("#n").val("");
                $("#n1").val("");
                $("#n2").val("");
                $("#n3").val("");
                $("#n4").val("");
                $("#s1").val("");
                $("#s2").val("");
                $("#first").val("");
                $("#last").val("");
                $("#department_name").val("Choose a Department");
                $("#title").val("Choose a title");
              //  $("#department_names").val("");
                $("#res").html(data);
                $('#employee_data').DataTable({
                    "destroy": true, //use for reinitialize datatable
                });
            }
        );
    })
})
</script>
<script>
$(document).ready(function() {
    $("#dept_salary").click(function() {
        $.post(
            "DataBase.php", {
                "dept_salary": $("#dept_salary").val(),
            },
            function(data, status) {
                $("#n").val("");
                $("#n1").val("");
                $("#n2").val("");
                $("#n3").val("");
                $("#n4").val("");
                $("#s1").val("");
                $("#s2").val("");
                $("#first").val("");
                $("#last").val("");
                $("#department_name").val("Choose a Department");
                $("#title").val("Choose a title");
               // $("#department_names").val("");
                $("#res").html(data);
                $('#employee_data').DataTable({
                    "destroy": true, //use for reinitialize datatable
                });
            }
        );
    })
})
</script>
<!-- <script>
$(document).ready(function() {
    $("#search_departments").click(function() {
        $.post(
            "DataBase.php", {
                "search_departments": $("#search_departments").val(),
                "department_names": $("#department_names").val(),
                "n4": $("#n4").val(),
            },
            function(data, status) {
                $("#n").val("");
                $("#n1").val("");
                $("#n2").val("");
                $("#n3").val("");
                $("#s1").val("");
                $("#s2").val("");
                $("#first").val("");
                $("#last").val("");
                $("#department_name").val("Choose a Departments");
                $("#title").val("Choose a titles");
                $("#res").html(data);
                $('#employee_data').DataTable({
                    "destroy": true, //use for reinitialize datatable
                });
            }
        );
    })
})
</script> -->
<!-- <script>
$(document).ready(function() {
    $("#n").tooltip({aling:"top"})
})
</script> -->

</html>