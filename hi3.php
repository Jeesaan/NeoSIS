<?php
$subidhi3 = $_POST['ID'];
$subID = $subidhi3;
include 'connection.php';
$options2="";
$options2=$options2."<option value=''>Select Subject</option>";  

$sqlqueryteach= mysqli_query($con,"Select * from subject_info where ID_sem='$subID'");


while ($row3 = mysqli_fetch_array($sqlqueryteach)) {
    $options2=$options2."<option value='$row3[0]'>$row3[1]</option>";

}
echo $options2;