<?php
session_start();

include 'connection.php';

$sqlstud= mysqli_query($con,"Select count(1) from student_info");
$sqlteach= mysqli_query($con,"Select count(1) from teacher_info");
$sqldept= mysqli_query($con,"select count(1) from dept_info");
$row1 = mysqli_fetch_array($sqlstud);
$row2 = mysqli_fetch_array($sqldept);
$row3 = mysqli_fetch_array($sqlteach);

$result1 = mysqli_query($con,"SELECT dept_info.dept_abbri,COUNT(student_info.ID_stud) AS number FROM student_info,dept_info WHERE student_info.ID_dept=dept_info.ID_dept GROUP BY student_info.ID_dept");

$result2 = mysqli_query($con, "SELECT dept_info.dept_abbri,COUNT(teacher_info.ID_teach) AS number FROM teacher_info,dept_info WHERE teacher_info.ID_dept=dept_info.ID_dept GROUP BY teacher_info.ID_dept");

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
        <link rel="shortcut icon" href="logo.png">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);
           google.charts.setOnLoadCallback(drawChart2);
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Department', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result1))  
                          {  
                               echo "['".$row["dept_abbri"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Student in each Department',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piestudent'));  
                chart.draw(data, options);  
           }
           function drawChart2()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Department', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo "['".$row["dept_abbri"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Percentage of Teacher in each Department',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('pieteacher'));  
                chart.draw(data, options);  
           }
           </script>  
    </head>
    
    <body>
        
        <?php
        // put your code here
        ?>
        <nav class="navbar navbar-inverse" style="border-radius: 0px;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <img src="resources/images/logo.png" alt="logo" width="30px" height="30px" style="margin-top: 10px;"/>
                </div>
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">NeoSIS</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.php">Home</a></li>
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Department<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="mandept.php">Manage Department</a></li>
                      <li><a href="mansem.php">Manage Semester</a></li>
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
        <div class="container">
            <div class="row">
            
                <div class="col-sm-3">
                    <button type="button" class="btn btn-primary btn-block">Total Students <span id="stud"class="badge"><?php echo $row1[0];?></span></button>
                </div>
                <div class="col-sm-3">
                    <button type="button" class="btn btn-success btn-block">Total Teachers <span id="teacher"class="badge"><?php echo $row3[0];?></span></button>
                </div>
                <div class="col-sm-3">
                    <button type="button" class="btn btn-info btn-block">Total Departments <span id="dept" class="badge"><?php echo $row2[0];?></span></button>
                </div>
                <div class="col-sm-3">
                    <button type="button" class="btn btn-default btn-block">Total Marksheets <span class="badge"> 7</span></button>
                </div>
            </div>
            <div class="row">
                <br/><br/>
                <div  id="piestudent" style="width: 550px; height: 400px; float: left;"></div>
                <div  id="pieteacher" style="width: 550px; height: 400px;float: left;"></div>
                
            </div>
        </div>
        

        
        <div class="footer-text" align='center'><b>NeoSIS &copy; <?php echo date('Y'); ?></b></div>
    </body>
</html>
