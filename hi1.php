<?php
session_start();

$deptidhi1 = $_POST['ID'];
$deptID = $deptidhi1;
include 'connection.php';
$options2="";
$options2=$options2."<option value=''>Select Semester</option>";  

$sqlqueryteach= mysqli_query($con,"Select * from sem_info where ID_dept='$deptID'");


while ($row3 = mysqli_fetch_array($sqlqueryteach)) {
    $options2=$options2."<option value='$row3[0]'>$row3[1]</option>";

}
echo $options2;
