<?php
$con = mysqli_connect("localhost","root","","Travel@1243Mate");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else {
    $_SESSION['login'] = "true";
}
  
