<?php

session_start();
$semidhi2 = $_POST['semid'];
$deptidhi2 = $_POST['depttype'];
$datehi2 = $_POST['date'];
$pertypehi2 = $_POST['pertype'];

//echo $semidhi2.$deptidhi2.$datehi2.$pertypehi2;
include "connection.php";
if ($pertypehi2 === '2'){
    $sql = mysqli_query($con, "Select * from teacher_info where ID_dept= '$deptidhi2'");
}elseif ($pertypehi2 === '3') {
    $sql = mysqli_query($con, "Select * from student_info where ID_dept= '$deptidhi2' AND ID_sem='$semidhi2'");
} else {
    echo 'error';
}
$result= mysqli_num_rows($sql);
if ($result > 0){
$tr='<tr>'
        .'<th>ID</th><th>Name</th><th>Attendance</th>'
        . '</tr>';
$result =1;
while($row= mysqli_fetch_array($sql)){
    $tr .='"<tr>'
            .'<td>'.$row[0].'</td>'
            .'<td>'.$row[2]." ".$row[3].'</td>'
            .'<td><div class="col-sm-7"><select id="'.$result.'"class="form-control btn-primary"><option value="">Give Attendance</option><option value="1">Present</option><option value="2">Absent</option><option value="3">Leave</option></select></div></td>'
        . '</tr>"';
    $result=$result+1;
}
$result= mysqli_num_rows($sql);
echo $result ." ".$tr;

}else{
    echo 'error';
}