<?php
session_start();
include ("connection.php");
if(isset($_SESSION['login']))
{
    
    $username = strip_tags($_POST['email']);
    $password = strip_tags($_POST['pwd']);

    $username = stripslashes($_POST['email']);
    $password = stripslashes($_POST['pwd']);

    $username = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['pwd']);
    echo $username;
    echo $password;

    $sql = "SELECT * from login where user='$username' and pass='$password'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

          // If result matched $myusername and $mypassword, table row must be 1 row

    if($count == 1) {


        header("location: home.php");
     }else {
        $error = "Your Login Name or Password is invalid";
     }
     $con->close();
}



