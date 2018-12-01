<?php
session_start();
include ("connection.php");
if(isset($_SESSION['login']))
{
    
    
    $subname = strip_tags($_POST['subname']);
    $submark = strip_tags($_POST['submark']);
    $semid = strip_tags($_POST['semname']);
    $deptid = strip_tags($_POST['dept_id']);
    $teachid = strip_tags($_POST['tname']);
    
    $subname = stripslashes($_POST['subname']);
    $submark = stripslashes($_POST['submark']);
    $semid = stripslashes($_POST['semname']);
    $deptid = stripslashes($_POST['dept_id']);
    $teachid = stripslashes($_POST['tname']);

    $subname = mysqli_real_escape_string($con,$_POST['subname']);
    $submark = mysqli_real_escape_string($con,$_POST['submark']);
    $semid = mysqli_real_escape_string($con,$_POST['semname']);
    $deptid = mysqli_real_escape_string($con,$_POST['dept_id']);
    $teachid = mysqli_real_escape_string($con,$_POST['tname']);
    
    $semid= substr($semid, 0, 1);
    $deptid= substr($deptid, strlen($deptid)-1, 1);
    $teachid = substr($teachid, 0, 1);
    //echo $subname.$submark.$deptid.$semid.$teachid;
     
    $sql = "INSERT INTO `subject_info`(`sub_name`, `marks`, `ID_teach`, `ID_sem`, `ID_dept`) VALUES ('$subname','$submark','$teachid','$semid','$deptid')";
    if ($con->query($sql) === TRUE) {
        $_SESSION['success']="true";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        echo 'successful';
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}



$con->close();
}