<?php
session_start();
include ("connection.php");
if(isset($_SESSION['login']))
{
    
    
    $fname = strip_tags($_POST['tfname']);
    $lname = strip_tags($_POST['tlname']);
    $age = strip_tags($_POST['tage']);
    $mobile = strip_tags($_POST['tcontact']);
    $address = strip_tags($_POST['taddress']);
    $city = strip_tags($_POST['tcity']);
    $email = strip_tags($_POST['temail']);
    $county = strip_tags($_POST['tcountry']);
    $reg_date = strip_tags($_POST['tregdate']);
    $dob = strip_tags($_POST['tdob']);
    $pertype = strip_tags($_POST['pertype']);
    $deptid = strip_tags($_POST['deptid']);
    
    $fname = stripslashes($_POST['tfname']);
    $lname = stripslashes($_POST['tlname']);
    $age = stripslashes($_POST['tage']);
    $mobile = stripslashes($_POST['tcontact']);
    $address = stripslashes($_POST['taddress']);
    $city = stripslashes($_POST['tcity']);
    $email = stripslashes($_POST['temail']);
    $county = stripslashes($_POST['tcountry']);
    $reg_date = stripslashes($_POST['tregdate']);
    $dob = stripslashes($_POST['tdob']);
    $pertype = stripslashes($_POST['pertype']);
    $deptid = stripslashes($_POST['deptid']);

    $fname = mysqli_real_escape_string($con,$_POST['tfname']);
    $lname = mysqli_real_escape_string($con,$_POST['tlname']);
    $age = mysqli_real_escape_string($con,$_POST['tage']);
    $mobile = mysqli_real_escape_string($con,$_POST['tcontact']);
    $address = mysqli_real_escape_string($con,$_POST['taddress']);
    $city = mysqli_real_escape_string($con,$_POST['tcity']);
    $email = mysqli_real_escape_string($con,$_POST['temail']);
    $county = mysqli_real_escape_string($con,$_POST['tcountry']);
    $reg_date = mysqli_real_escape_string($con,$_POST['tregdate']);
    $dob = mysqli_real_escape_string($con,$_POST['tdob']);
    $pertype = mysqli_real_escape_string($con,$_POST['pertype']);
    $deptid = mysqli_real_escape_string($con,$_POST['deptid']);
     

    $sql = "INSERT INTO teacher_info (fst_name,lst_name,age,dob,mobile_no,email_id,city,address,country,reg_date,ID_per_type,ID_dept) 
            VALUES ('$fname','$lname','$age','$dob','$mobile','$email','$city','$address','$county','$reg_date','$pertype','$deptid');";
    if ($con->query($sql) === TRUE) {
        $_SESSION['success']="true";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        echo 'successful';
} else {
    $_SESSION['tsuccess']="false";
    $_SESSION['terror']="Error: " . $sql . "<br>" . $con->error;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    echo "Error: " . $sql . "<br>" . $con->error;
}

$con->close();
}