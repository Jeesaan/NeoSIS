<?php
session_start();
include ("connection.php");
if(isset($_SESSION['login']))
{
    
    
    $dname = strip_tags($_POST['dname']);
    $daname = strip_tags($_POST['daname']);
    
    $dname = stripslashes($_POST['dname']);
    $daname = stripslashes($_POST['daname']);

    $dname = mysqli_real_escape_string($con,$_POST['dname']);
    $daname = mysqli_real_escape_string($con,$_POST['daname']);
    

    $sql = "INSERT INTO dept_info (dept_name,dept_abbri) 
            VALUES ('$dname','$daname');";
    if ($con->query($sql) === TRUE) {
        $_SESSION['success']="true";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        //echo 'successful';
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
}