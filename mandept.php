<?php
    session_start();
    
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
                        <li class="active"><a href="mandept.php">Manage Department</a></li>
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
        <div style="margin: 8px; border-radius: 4px; background-color: #ccccff;">
            <a href="home.php">Home</a> > Manage Department
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
        
        <div class="container" style=" border: #23899b 2px solid; border-radius: 5px;">
            
            
            <!--Body...-->
            <div class="row" style="padding: 8px;">
                
                
                <!--Head..-->
                <div class="col-sm-12" style="border-bottom: #2ecdf8 2px solid; font-size: 24px;">
                    Manage Department
                </div>
                
                <!-- Add teacher button...-->
                <div class="col-sm-12">
                    
                    <button class="navbar-right btn btn-success" data-toggle="modal" data-target="#myModal" style="margin-top: 8px;"><span class="glyphicon glyphicon-plus"></span> Add Department</button>
                    <form action="dte.php" method="post">
                        <button type="submit" name="deptreport" class="navbar-right btn btn-primary" style="margin-top: 8px; margin-right: 2%;"><span class="glyphicon glyphicon-download"></span> Department report</button>
                    </form>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog" style="height: 20%;">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><b>Add Department</b></h4>
                          </div>
                            <form name="myForm" onsubmit="return validateForm()" action="deptinsert.php" method="POST">
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <h3><b>Department Information...</b></h3>
                                        </div>
                                        
                                        <div class="col-sm-5" style="margin-left: 3%;">
                                            <input type="text" name="dname" class="form-control margin1 " id="dname" placeholder="Department Name" required=""/>
                                            <input type="text" name="daname" class="form-control margin1 " id="daname" placeholder="Abbreviation of Department" required=""/>
                                            
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
                
                <!--Teacher search row...-->
                <div class="col-sm-12" style="margin-top: 10px;">
                    <div style="width: 40px; float: left;margin-top: 5px;"><p>Show</p></div>
                    <div class="col-sm-1">
                        
                        <select name="num" class="navbar-left form-control">
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        
                    </div>
                    <div style="width: 40px; float: left;margin-top: 5px;"><p>Entries.</p></div>
                    <?php $GLOBALS['search']="";?>
                    <form method="POST" action="mandept.php">
                        
                        <div class="col-sm-1 navbar-right"><button type="submit" class="form-control btn-primary"><span class="glyphicon glyphicon-search"></span></button></div>
                        <div class="col-sm-4 navbar-right"style="margin-right: -2%;"><input type="text" class="form-control" style="background-image: url('resources/images/search1.png'); background-repeat: no-repeat; background-position: 5px 6px; padding-left: 12%; " name="searchbox" placeholder="Search Department Name/ID..." value="<?php echo $GLOBALS['search'];?>" /></div>
                        
                    </form>                    
                </div>
                
                <!-- Teacher detail Table...-->
                <div class="col-sm-12" style="margin-top: 10px;">
                    <div class="table-responsive">          
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Department Name</th>
                                <th>Abbreviation Name</th>
                                <th>Action</th>
                            </tr>
                            <?php
                                include ("connection.php");
                                if(isset($_GET['page'])){
                                    $page= $_GET['page'];
                                }else {
                                    $page=1;
                                }
                                
                                
                                if($page == '' || $page == '1')
                                {
                                    $page1=0;
                                } else {
                                    $page1= ($page * 10)-10;
                                }
                                
                                if(isset($_POST['searchbox']))
                                {
                                   $valueToSearch = $_POST['searchbox'];
                                   
                                    // search in all table columns
                                    // using concat mysql function
                                    $query = "SELECT * FROM `dept_info` WHERE `dept_name` LIKE '%".$valueToSearch."%'OR`ID_dept` LIKE '%".$valueToSearch."%'  limit $page1,10;" ;
                                    $sqlquery = $con->query($query); 
                                } else { 
                                $sqlquery = $con->query("select * from dept_info limit $page1,10;");
                                }                            
                                
                                $row = mysqli_num_rows($sqlquery);
                                if( $row > 0){
                                while ($row = mysqli_fetch_array($sqlquery)) {
                                     
                                        
                            ?>
                            <tr>
                                <td><?php echo $row['ID_dept'];?></td>
                                <td><?php echo $row['dept_name'];?></td>
                                <td><?php echo $row['dept_abbri'];?></td>
                                <td>Action</td>
                            </tr>
                            <?php 
                                }
                                }else{
                            ?>
                            <tr>
                                <td colspan="8" style="text-align: center; font-size: 14px;">No Record found...</td></tr>
                            <?php
                                }
                                //counting number of paging
                                $sqlquery = $con->query("select * from dept_info;");
                                $cou= mysqli_num_rows($sqlquery);
                                $k=10;
                                $s= $cou / 10;
                                $s= ceil($s);
                                
                            ?>
                        </table>                    
                    </div>
                </div>
                
                <!--Number of entry shown...-->
                
                <div class="col-sm-2" style="margin-top: 25px;">
                   <?php 
                   if(($k*$page) > mysqli_num_rows($sqlquery)){
                       echo mysqli_num_rows($sqlquery);
                   }elseif ( $page == ''){ echo '10';
                       
                   }else{
                   echo ($k*$page); } ?> of <?php echo mysqli_num_rows($sqlquery); ?> entries.
                </div>
                <div class="col-sm-10">
                <?php
                    for($b=$s;$b>=1;$b--){
                ?>
                <ul class="pagination navbar-right">
                    <li><a href="mandept.php?page=<?php echo $b ; ?>"><?php echo $b . " ";?></a></li>                    
                </ul>
                <?php
                }
                ?>
                </div>
            </div>
            
        </div>
        
        <script>
function validateForm() {
    var x = document.forms["myForm"]["dname"].value;
    var y = document.forms["myForm"]["daname"].value;
    var res = isNaN(x);
    var res1 = isNaN(y);
    if (res === false) {
        //document.getElementById("dname").innerHTML=;
        alert("Department Name must be text");
        return false;
    }else if(res1 === false){
        //document.getElementById("daname").innerHTML=;
        alert("Department abbreviation Name must be text");
        return false;
    }
        
}
</script>
        <!-- Footer of the page... -->
        <div class="footer-text" align='center'><b>NeoSIS &copy; <?php echo date('Y'); ?></b></div>
    </body>
</html>
