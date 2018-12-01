<?php
    session_start();
    
    include 'connection.php';
    
    $sqlqueryteach= mysqli_query($con,"Select * from person_type where ID_per_type > 1");
    $sql= mysqli_query($con, "Select * from dept_info ");
    $options="";
    $options1="";
    $options=$options."<option value=''>Select Type</option>";
    $options1=$options1."<option value=''>Select Department</option>";
    while ($row3 = mysqli_fetch_array($sqlqueryteach)) {
        $options=$options."<option value='$row3[0]'> $row3[1]</option>";
    }
    while ($row3 = mysqli_fetch_array($sql)) {
        $options1=$options1."<option value='$row3[0]'> $row3[1]</option>";
    }
    
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
        tr{
            margin: 3%;
        }
    </style>
    <script>
        var len="";
        function myFunction(){                        
                        
            document.getElementById("perid").click();

        }
        function chk(){
            var e = document.getElementById("pertype");

            strUser = e.options[e.selectedIndex].value;
            
            var dataString = "ID="+strUser;
            $.ajax({
                type:"post",
                url:"hi.php",
                data:dataString,
                cache:false,
                success: function (html) {
                    $("#text").html(html);
                }
            });
            return false;
        }
        function myFunction4(){
            
            //document.write(len);
            var e1 =document.getElementById("attandanceall");
            var val=e1.options[e1.selectedIndex].value;
            for(i=1;i<=len;i++){
            var e = document.getElementById(i);
            e.value=val;
        }
        }
        function myFunctionsub(){                        
                        
            document.getElementById("semid").click();

        }
        function chk5(){
            var e = document.getElementById("semtype");

            strUser = e.options[e.selectedIndex].value;
            
            var dataString = "ID="+strUser;
            $.ajax({
                type:"post",
                url:"hi3.php",
                data:dataString,
                cache:false,
                success: function (html) {
                    $('#subid').html(html);
                }
            });
            return false;
        }
        function myFunction2(){                        
                        
            document.getElementById("deptid").click();

        }
        function chk2(){
            var e = document.getElementById("depttype");

            strUser = e.options[e.selectedIndex].value;
            
            var dataString = "ID="+strUser;
            $.ajax({
                type:"post",
                url:"hi1.php",
                data:dataString,
                cache:false,
                success: function (html) {
                    $('#semtype').html(html);
                }
            });
            return false;
        }
        
        function chk3(){
            
            var semid = document.getElementById("semtype");
            var deptid = document.getElementById("depttype");
            
            semid1 = semid.options[semid.selectedIndex].value;
            deptid1 = deptid.options[deptid.selectedIndex].value;
            
            
            
            var dataString = "semid="+semid1+"&depttype="+deptid1;
            //document.write(dataString);
            $.ajax({
                type:"post",
                url:"marksdisplay.php",
                data:dataString,
                cache:false,
                success: function (html) {
                        $("#text1").text(html);
                }
            });
            return false;
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
                  <li class="dropdown "><a class="dropdown-toggle" data-toggle="dropdown" href="#">Department<span class="caret"></span></a>
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
                  <li class="active"><a href="marks.php">Marks</a></li>
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
            <a href="home.php">Home</a> > Manage Marks
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
        <div class="container" style="border: 2px solid;">
            <div class="row">
                
                <div class="col-sm-5 navbar-right">
                    <!--Excel File Upload-->
                    <br/>
                    <form action="studmasinsert.php" method="POST" enctype="multipart/form-data">
                        <input type="file" class="form-control" name="file" id="file">
                        <button type="submit" class="navbar-right btn btn-primary" style="margin-top: 8px; margin-right: 2%;"><span class="glyphicon glyphicon-upload"></span> Upload Marks Excel</button>
                    </form>
                    
                    
                    
                    <a href="downloadmarks.php"><button class="navbar-right btn btn-primary" style="margin-top: 8px; margin-right: 2%;"><span class="glyphicon glyphicon-download"></span> download Marks Excel</button></a>
                </div>
                <div class="col-sm-12 btn-group-vertical">
                    <br/>                        
                    
                    <form method="POST">
                        <select id="depttype" onchange="myFunction2()" class="selectpicker form-control" data-live-search="true">
                        <?php echo $options1;?>
                    </select>
                        <input type="submit" hidden="true" id="deptid" onclick="return chk2()"/>
                    </form>
                    <br/> 
                    
                    <select id="semtype" onchange="myFunctionsub()"class="form-control">
                        <option value="">Select Semester</option>
                    </select><br/>
                    <input type="text" class="form-control" placeholder="Enter Year"/>
                </div>
                <div class="col-sm-1 navbar-right">
                    <br/>
                    <form method="POST">
                        <button type="submit" onclick="return chk3()" class="btn btn-success" style="margin: 5%;">GO !</button>
                    </form>
                </div>
                <br/><br/>
                <p id="text"></p>
                <br/>
                <textarea id="text1" hidden="true" style=" width: 500px; height: 500px;"></textarea>
                                
                
            </div>
        </div>
        

        <!-- Footer of the page... -->
        <div class="footer-text" align='center'><b>NeoSIS &copy; <?php echo date('Y'); ?></b></div>
    </body>
</html>
