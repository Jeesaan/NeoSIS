<?php
    session_start();
    
    include 'connection.php';
    
    $sqlqueryteach= mysqli_query($con,"Select * from person_type where ID_per_type = '2'");
    $sql= mysqli_query($con, "Select * from dept_info");
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
        .fileContainer {
            overflow: hidden;
            position: relative;
        }

        .fileContainer [type=file] {
            cursor: inherit;
            display: block;
            font-size: 999px;
            filter: alpha(opacity=0);
            min-height: 100%;
            min-width: 100%;
            opacity: 0;
            position: absolute;
            right: 0;
            text-align: right;
            top: 0;
        }

        /* Example stylistic flourishes */

        .fileContainer {
            background: white;
            border-radius: .5em;
            float: left;
            padding: .5em;
        }

        .fileContainer [type=file] {
            cursor: pointer;
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
                  <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Department<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="mandept.php">Manage Department</a></li>
                      <li><a href="mansem.php">Manage Semester</a></li>
                      <li><a href="mansub.php">Manage Subject</a></li>
                    </ul>
                  </li>
                  <li><a href="student.php">Student</a></li>
                  <li class="active"><a href="teacher.php">Teacher</a></li>
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
            <a href="home.php">Home</a> > Teacher
        </div>
        
        <div style="margin: 8px;">
            <?php
            $var ="true";
            if(isset($_SESSION['tsuccess'])){
            if($_SESSION['tsuccess'] == $var)
            {
            ?>
            <div class="alert alert-success">
                <strong>Success!</strong> Data entry is successful...
            </div>
            <?php
            }else{?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> <?php echo $_SESSION['terror']?>
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
                    Manage Teacher
                </div>
                <div class="col-sm-5 navbar-right">
                    <!--Excel File Upload-->
                    <br/>
                    <form action="studmasinsert.php" method="POST" enctype="multipart/form-data">
                        <input type="file" class="form-control" name="file" id="file">
                        <button type="submit" class="navbar-right btn btn-primary" style="margin-top: 8px; margin-right: 2%;"><span class="glyphicon glyphicon-upload"></span> Upload teacher Excel</button>
                    </form>
                    
                    
                    
                    <a href="downloadteacher.php"><button class="navbar-right btn btn-primary" style="margin-top: 8px; margin-right: 2%;"><span class="glyphicon glyphicon-download"></span> download teacher Excel</button></a>
                </div>
                <!-- Add teacher button...-->
                <div class="col-sm-12">
                    <button class="navbar-right btn btn-success" data-toggle="modal" data-target="#myModal" style="margin-top: 8px;"><span class="glyphicon glyphicon-plus"></span> Add Teacher</button>
                    
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog" style="width: 55%;">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><b>Add Teacher Information</b></h4>
                          </div>
                            <form action="techinsert.php" method="POST">
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                                                                
                                        <div class="col-sm-3"style="margin-left: 20px;">
                                            <h4><b>Personal Details...</b></h4><hr/>
                                            <input type="text" name="tfname" onfocusout="validateForm()" class="form-control margin1 " id="tfname" placeholder="First Name" required="Enter First name"/>
                                            <input type="text" name="tlname" onfocusout="validateForm1()" class="form-control margin1 " id="tlname" placeholder="Last Name" required=""/>
                                            <input type="date" name="tdob" class="form-control margin1 " id="tdob" placeholder="Date Of Birth" required=""/>
                                            <input type="text" name="tage" onfocusout="validateForm2()" class="form-control margin1 " id="tage" placeholder="Age"/>
                                            <input type="text" name="tcontact" onfocusout="validateForm3()" class="form-control margin1 " id="tcontact" placeholder="Contact No." required=""/>
                                            <input type="email" name="temail" onfocusout="validateForm4()" class="form-control margin1 " id="temail" placeholder="Email ID" required=""/>
                                            <input type="text" name="taddress" onfocusout="validateForm5()" class="form-control margin1 " id="taddress" placeholder="Address" required=""/>
                                            <input type="text" name="tcity" class="form-control margin1 " id="tcity" placeholder="City"/>
                                            <input type="text" name="tcountry" class="form-control margin1 " id="tcountry" placeholder="Country"/></br>
                                        </div>                                        
                                        <div class="col-sm-3">
                                            <h4><b>Job Details...</b></h4><hr/>
                                            <input type="date" name="tregdate" class="form-control margin1" id="tregisterdate" data-toggle="tooltip" data-placement="bottom" title="Registration Date"/>
                                            <br/>
                                            <select id="pertype" name="pertype" class="selectpicker form-control" data-live-search="true">
                                                <?php echo $options;?>
                                            </select>                        
                                            <br/><br/>                                            
                                            <select id="depttype" name="deptid" class="selectpicker form-control" data-live-search="true">
                                            <?php echo $options1;?>
                                            </select>
                                            
                                            <br/>                                                                  
                                            <img src="resources/images/photo1.png" alt="Select Photo..." class="form-control margin1" style="width:100%; height:40%;"/>
                                            
                                            
                                            <p id="text1"></p>
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
                 <?php $GLOBALS['search']="";?>         
                
                
                <!--Teacher search row...-->
                <div class="col-sm-12" style="margin-top: 10px;">
                    <div style="width: 40px; float: left;margin-top: 5px;"><p>Show</p></div>
                    <div class="col-sm-1">
                        <input type="number" id='num1' name="num1" class="form-control" disabled style="width: 60px;" value="10" />
                    </select>
                    </div>
                    <div style="width: 40px; float: left;margin-top: 5px; margin-left: 6px;"><p>Entries.</p></div>
                                        
                    <form method="POST" action="teacher.php">
                        
                        <div class="col-sm-1 navbar-right"><button type="submit" class="form-control btn-primary"><span class="glyphicon glyphicon-search"></span></button></div>
                        <div class="col-sm-4 navbar-right"style="margin-right: -2%;"><input type="text" class="form-control" style="background-image: url('resources/images/search1.png'); background-repeat: no-repeat; background-position: 5px 6px; padding-left: 12%; " name="searchbox" placeholder="Search Teacher Name..." value="<?php echo $GLOBALS['search'];?>" /></div>
                        
                    </form>
                        
                                        
                </div>
                
                <!-- Teacher detail Table...-->
                <div class="col-sm-12" style="margin-top: 10px;">
                    <div class="table-responsive">          
                        <table class="table" id="myTable">
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>First Name</th>
                                <th>Last Name</th>                                                                
                                <th>Mobile No.</th>
                                <th>Email Id</th>                                
                                <th>Registration Date</th>
                                <th>Actions</th>
                            </tr>
                            <?php
                                include ("connection.php");
                                                               
                                if(isset($_GET['page'])){
                                    $page= $_GET['page'];
                                }else {
                                    $page= 1;
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
                                    $query = "SELECT * FROM `teacher_info` WHERE `fst_name` LIKE '%".$valueToSearch."%'OR`lst_name` LIKE '%".$valueToSearch."%'OR `ID_teach` LIKE '%".$valueToSearch."%'  limit $page1,10;" ;
                                    $sqlquery = filterTable($query); 
                                } else { 
                                $sqlquery = $con->query("select * from teacher_info limit $page1,10;");
                                }
                                $GLOBALS['con']=$con;
                                // function to connect and execute the query
                                function filterTable($query)
                                {
                                    
                                    $filter_Result = mysqli_query($GLOBALS['con'], $query);
                                    return $filter_Result;
                                }
                                $row = mysqli_num_rows($sqlquery);
                                
                                if( $row){
                                while ($row= mysqli_fetch_array($sqlquery)) {
                                

                            ?>
                            <tr>
                                <th><?php echo $row['ID_teach'];?></th>
                                <th><?php echo $row['photo'];?></th>
                                <th><?php echo $row['fst_name'];?></th>
                                <th><?php echo $row['lst_name'];?></th>                                                                
                                <th><?php echo $row['mobile_no'];?></th>
                                <th><?php echo $row['email_id'];?></th>                                
                                <th><?php echo $row['reg_date'];?></th>
                                <th>Action</th>
                            </tr>
                            
                            <?php 
                                }
                                }
                                else {?>
                            <tr>
                                <td colspan="8" style="text-align: center; font-size: 14px;">No Record found...</td></tr>
                            <?php
                                }
                                

                                
                                //counting number of paging
                                $sqlquery = $con->query("select * from teacher_info;");
                                
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
                   }elseif ( $page== ''){ echo '10';
                       
                   }else{
                   echo ($k*$page); } ?> of <?php echo mysqli_num_rows($sqlquery); ?> entries.
                </div>
                <div class="col-sm-10">
                <?php
                    for($b=$s;$b>=1;$b--){
                ?>
                <ul class="pagination navbar-right">
                    <li><a href="teacher.php?page=<?php echo $b ; ?>"><?php echo $b . " ";?></a></li>                    
                </ul>
                <?php
                }
                ?>
                </div>
                </div>
            </div>
        

        <!-- Footer of the page... -->
        <div class="footer-text" align='center'><b>NeoSIS &copy; <?php echo date('Y'); ?></b></div>
        
        <script>
            errvalidate=0;
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();                
            });
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
        function validateForm(){
            var x = document.getElementById("tfname").value;            
            
            if(isNaN(x) === false){
                alert("Enter text only");
                document.getElementById("tfname").style.borderColor = "red";
                errvalidate = 1;
            }else{
                if(errvalidate > 0){
                    errvalidate = 0;
                }                    
                document.getElementById("tfname").style.borderColor = "#D3D3D3";
            }
        }
        function validateForm1(){
            var x = document.getElementById("tlname").value;            
            
            if(isNaN(x) === false){
                alert("Enter text only");
                document.getElementById("tlname").style.borderColor = "red";
                errvalidate = 1;
            }else{
                if(errvalidate > 0){
                    errvalidate= 0;
                }
                document.getElementById("tlname").style.borderColor = "#D3D3D3";
            }
        }        
        function validateForm2(){
            var x = document.getElementById("tage").value;            
            
            if(isNaN(x) === true){
                alert("Enter number only");
                document.getElementById("tage").style.borderColor = "red";
                errvalidate = 1;
            }else{
                if(errvalidate > 0){
                    errvalidate = 0;
                }
                document.getElementById("tage").style.borderColor = "#D3D3D3";
            }
        }
        function validateForm3(){
            var x = document.getElementById("tcontact").value;            
            //document.write(x);
            if(isNaN(x) === true){
                alert("Enter number only");
                document.getElementById("tcontact").style.borderColor = "red";
                errvalidate = 1;
            }else{
                if( x > 999999999 && x < 10000000000){
                if(errvalidate > 0){
                    errvalidate = 1;
                }
                document.getElementById("tcontact").style.borderColor = "#D3D3D3";
            }else{
                alert("Enter 10 digit number only");
                document.getElementById("tcontact").innerHTML="Enter text only";
                document.getElementById("tcontact").style.borderColor = "red";
                errvalidate = 1;
            }
            }
        }
        function validateForm4(){
            
            var x = document.getElementById("temail").value;            
            var atpos = x.indexOf("@");
            var dotpos = x.lastIndexOf(".");
            if(isNaN(x) === false){
                alert("Numbers not allowed");
                document.getElementById("temail").style.borderColor = "red";
                errvalidate = 1;
            }else{
                if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
                    alert("Not a valid e-mail address");
                    return false;
                }
                if(errvalidate > 0){
                    errvalidate = 0;
                }
                document.getElementById("temail").style.borderColor = "#D3D3D3";
            }
        }
        function validateForm5(){
            
        var x = document.getElementById("taddress").value;            
        //document.write(x);    
            if(isNaN(x) === false){
                alert("Enter text only");
                document.getElementById("taddress").style.borderColor = "red";
                errvalidate = 1;
            }else{
                if(errvalidate > 0){
                    errvalidate = 0;
                }                    
                document.getElementById("taddress").style.borderColor = "#D3D3D3";
            }
        }
        
        
        </script>
    </body>
</html>
