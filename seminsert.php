<?php
session_start();
include ("connection.php");
if(isset($_SESSION['login']))
{
    
    
    $fname = strip_tags($_POST['sname']);
    
    $age = strip_tags($_POST['dept_id']);
    
    $fname = stripslashes($_POST['sname']);
    
    $age = stripslashes($_POST['dept_id']);

    $fname = mysqli_real_escape_string($con,$_POST['sname']);
    
    $age = mysqli_real_escape_string($con,$_POST['dept_id']);
     
    
    $age= substr($age, strlen($age)-1, 1);
     
    $sql = "INSERT INTO `sem_info`(`sem_code`, `ID_dept`) VALUES ('$fname','$age')";
    if ($con->query($sql) === TRUE) {
        $_SESSION['success']="true";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        echo 'successful';
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}



$con->close();
}