<?php
    session_start();
    
    include 'connection.php';
    
    
    $sql= mysqli_query($con, "Select * from dept_info ");
    
    $options1="";
    
    $options1=$options1."<option value=''>Select Department</option>";
    
    while ($row3 = mysqli_fetch_array($sql)) {
        $options1=$options1."<option>$row3[0]. $row3[1]</option>";
    }
?>
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
                  <li><a href="marks.php">Marks</a></li>
                  <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Report<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="studenttoexcel.php">Student to Excel</a></li>
                            <li><a href="teachertoexcel.php">Teacher to Excel</a></li>
                            <li><a href="teachertoexcel.php">Teacher to Excel</a></li>
                            <li><a href="markstoexcel.php">Marks to Excel</a></li>
                        </ul>
                  </li>
                </ul>
            </div>
        </nav>
        <div style="margin: 8px; border-radius: 4px; background-color: #ccccff;">
            <a href="home.php">Home</a> > Student to Excel
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
                
                <div class="col-sm-12 btn-group-vertical">
                    <br/>                        
                    <center><h1>Export Teacher Data to Excel!!!</h1></center>
                    <form action="tte.php" method="POST">                  
                    <select id="depttype" name="deptid" class="selectpicker form-control" data-live-search="true">
                        <?php echo $options1;?>
                    </select><br/><br/>
                    
                    
                    <input type="text" name="year" class="form-control" placeholder="Enter Year"/>
                    
                    <button type="submit" class="btn btn-success navbar-right" style="margin: 2%;">GO !</button>
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


