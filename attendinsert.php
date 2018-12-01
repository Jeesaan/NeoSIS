<?php
session_start();
include ("connection.php");
$len=$_POST['len'];
$j=0;
$k=1;
$deptid=$_POST["deptid"];
$semid=$_POST["semid"];
$pertype=$_POST["pertype"];
$dateat=$_POST["date"];
$subid=$_POST["subid"];
$suraj="";
echo $dateat;

    $true=0;
for($j=0;$j<($len*3);$j +=3){
    $ID=$_POST["$j"];
    $attype=$_POST["a"."$k"];
    $sql= "INSERT INTO `attendance_info`(`ID_per_type`, `ID_stud_tech`, `ID_sub`,`ID_sem`, `date`,`atten_type`)
SELECT * FROM (SELECT '$pertype','$ID','$subid','$semid','$dateat','$attype') AS tmp
WHERE NOT EXISTS(SELECT ID_stud_tech FROM attendance_info 
                 WHERE ID_sub = '$subid' AND date = '$dateat' AND ID_stud_tech= '$ID') limit 1";
     
    if($con->query($sql)===TRUE){
        $true=1;
    }
    $k++;
}   

    
if($true===1){
    $_SESSION['asuccess']="true";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    echo "Successful";
} else {
    $_SESSION['aerror']= 'Error:'.$con->error;
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
    echo $con->error;
}

    


$con->close();
