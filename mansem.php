<?php
    session_start();
    
    include 'connection.php';
    if (isset($_GET['page'])){
        $id = substr($_GET['page'], strlen($_GET['page'])-1, 1);
    $sqlqueryteach= mysqli_query($con,"Select * from dept_info where ID_dept = '$id'");
    
    $options="";
    $options=$options.'<option value="">Select Department Name</option>';
    while ($row3 = mysqli_fetch_array($sqlqueryteach)) {
        $options=$options."<option value='$row3[0]'>($row3[2]) $row3[1]</option>";
    
    }}
    
    
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="shortcut icon" href="logo.png">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>

        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>

    </head>
    <style>
        .labels1{
            width:100%;
            text-align: right;
            font-size: 10px;
            margin: 20px;
            margin-left: 0px;
        }
        
        .labels2{
            width:100%;
            text-align: right;
            font-size: 10px;
            margin: 20px;
            margin-left: 0px;
        }
        .margin1{
            margin-top: 19px;
            
        }
    </style>
    <script>
        function validateform(){
            var x = document.forms["myForm"]["sname"].value;
            //var y = document.forms["myForm"]["daname"].value;
            //document.write(x);
            var res = isNaN(x);
            if (res === false) {
                //document.getElementById("dname").innerHTML=;
                alert("Semester Name must be text");
                return false;
            }
        }
    </script>
    <body>
        
        <nav class="navbar navbar-inverse" style="border-radius: 0px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <img src="resources/images/logo.png" alt="logo" width="30px" height="30px" style="margin-top: 10px;"/>
                </div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">NeoSIS</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                  <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Department<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="mandept.php">Manage Department</a></li>
                        <li class="active"><a href="mansem.php">Manage Semester</a></li>
                      <li><a href="mansub.php">Manage Subject</a></li>
                    </ul>
                  </li>
                  <li><a href="student.php">Student</a></li>
                  <li><a href="teacher.php">Teacher</a></li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Attendance<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="attendance.php">Take Attendance</a></li>
                        <li><a href="tattendance.php">Attendance Report</a></li>
                    </ul>
                  </li>
                  <li><a href="marks.php">Marks</a></li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Report<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="studenttoexcel.php">Student to Excel</a></li>
                            <li><a href="teachertoexcel.php">Teacher to Excel</a></li>
                            <!--<li><a href="teachertoexcel.php">Teacher to Excel</a></li>-->
                            <li><a href="markstoexcel.php">Marks to Excel</a></li>
                        </ul>
                  </li>
                </ul>
            </div>
        </nav>
        <div style="margin: 8px; border-radius: 4px; background-color: #ccccff;">
            <a href="home.php">Home</a> > Manage Semester
        </div>
        
        <div style="margin: 8px;">
            <?php
            $var ="true";
            if(isset($_SESSION['success'])){
            if($_SESSION['success'] == $var)
            {
            ?>
            <div class="alert alert-success">
                <strong>Success!</strong> Data entry is successful...
            </div>
            <?php
            }
            }
            ?>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 btn-group-vertical">
                    <button type="button" class="btn btn-primary">Department</button>
                    
                    <?php
                    include ("connection.php");
                    $sqlquery = $con->query("select * from dept_info;");
                    $row = mysqli_num_rows($sqlquery);
                    if ($row > 0){
                    while ($row = mysqli_fetch_array($sqlquery)) {
                    ?>
                    <button type="button" class="btn btn-default"><a href="mansem.php?page=<?php echo $row[1].$row['ID_dept']; ?>"><?php echo $row['dept_abbri']; ?></a></button>
                    <?php
                        }
                    }else{
                    ?>
                    <button type="button" class="btn btn-default">No Record Found...</button>
                    <?php
                    }
                    ?>
                </div>
                <div class="col-md-8 btn-group-vertical"  style="padding: 0px; border: 1px solid #ccccff; border-radius: 5px;">
                    <button type="button" class="btn btn-primary">Add Semester</button>
                    <?php
                        if(isset($_GET['page']))
                        {   
                    ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7" style="margin-left: 5%;" >
                                <p class="form-control" style="border: none; font-size: 18px; text-align: center;"><b><?php echo substr($_GET['page'], 0, strlen($_GET['page'])-1); ?></b></p>
                                <button class="navbar-right btn btn-success" data-toggle="modal" data-target="#myModal" style="margin-top: 8px;"><span class="glyphicon glyphicon-plus"></span> Add Semester</button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog" style="width: 55%;">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><b>Add Semester</b></h4>
                                              </div>
                                                <form name="myForm" onsubmit="return validateform()"action="seminsert.php" method="POST">
                                                <div class="modal-body">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <h3><b>Semester Information...</b></h3>
                                                            </div>

                                                            <div class="col-sm-6"style="margin-left: 20px;">

                                                                <input type="text" name="sname" class="form-control margin1 " id="sname" placeholder="Semester name" required=""/></br>
                                                                
                                                                <select name="tname" class="selectpicker" data-live-search="true" required="">                                                                   
                                                                    <?Php echo $options;?>                                                                    
                                                                </select>
                                                                <input type="text" name="dept_id" hidden="true" value="<?php echo $_GET['page']; ?>"/>
                                                                
                                                            </div>                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-8" style="margin-top: 10px;">
                                <div class="table-responsive">          
                                    <table class="table">
                                        <tr>
                                            <th>ID</th>
                                            <th>Semester</th>
                                            
                                            <th>Department_ID</th>
                                            <th>Actions</th>
                                        </tr>
                                        <?php
                                            
                                            include ("connection.php");
                                            if(isset($_GET['page'])){
                                                $page= substr($_GET['page'], strlen($_GET['page'])-1);
                                                
                                            }else {
                                                $page= 1;
                                            }
                                           
                                            
                                            $sqlquery = $con->query("select * from sem_info where ID_dept = $page;");
                                            
                                            while($row = mysqli_fetch_array($sqlquery)){
                                                
                                                
                                                
                                            
                                        ?>
                                        <tr>
                                            <th><?php echo $row['ID_sem'];?></th>
                                            <th><?php echo $row['sem_code'];?></th>
                                            
                                            <th><?php echo $row[2];?></th>
                                            <th>Action</th>
                                        </tr>

                                        <?php 
                                            
                                            }
                                        ?>
                                    </table>                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                        else {
                    ?>
                    <p class="form-control" style="border: none; text-align: center;padding-top: 12px;">Select Department...</p>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        
        

        <!-- Footer of the page... -->
        <div class="footer-text" align='center'><b>NeoSIS &copy; <?php echo date('Y'); ?></b></div>
    </body>
</html>
