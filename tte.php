<?php

session_start();

include 'connection.php';
$deptID=$_POST["deptid"];
$year=$_POST["year"];
$deptID= substr($deptID, 0, 1);

//echo $deptID."     ".$year;

$query = mysqli_query($con, "SELECT teacher_info.ID_teach,teacher_info.fst_name,teacher_info.lst_name,teacher_info.dob,teacher_info.age,teacher_info.mobile_no,teacher_info.email_id,teacher_info.address,teacher_info.city,teacher_info.country,teacher_info.reg_date,person_type.name,dept_info.dept_name
FROM teacher_info,dept_info,person_type WHERE person_type.ID_per_type=teacher_info.ID_per_type AND teacher_info.ID_dept=dept_info.ID_dept AND teacher_info.reg_date LIKE '%$year%' AND teacher_info.ID_dept='$deptID'");

$option ="";
if (mysqli_num_rows($query) > 0){
    $option .='<table class="table" bordered=1>'
            . '<tr>'
            . '<th>'
            . 'ID'
            . '</th>'
            . '<th>'
            . 'Name'
            . '</th>'
            . '<th>'
            . 'D.O.B'
            . '</th>'
            . '<th>'
            . 'Age'
            . '</th>'
            . '<th>'
            . 'Email'
            . '</th>'
            . '<th>'
            . 'Mobile No.'
            . '</th>'
            . '<th>'
            . 'Address'
            . '</th>'
            . '<th>'
            . 'City'
            . '</th>'
            . '<th>'
            . 'Country'
            . '</th>'
            . '<th>'
            . 'Registration Date'
            . '</th>'
            . '<th>'
            . 'Department Name'
            . '</th>'
            . '<th>'
            . 'Person Type'
            . '</th>'
            . '</tr>';
    while ($row = mysqli_fetch_array($query)) {
        $option .='<tr>'
                . '<td>'.$row[0].'</td>'
                . '<td>'.$row[1]." ".$row[2].'</td>'
                . '<td>'.$row[3].'</td>'
                . '<td>'.$row[4].'</td>'
                . '<td>'.$row[6].'</td>'
                . '<td>'.$row[5].'</td>'
                . '<td>'.$row[7].'</td>'
                . '<td>'.$row[8].'</td>'
                . '<td>'.$row[9].'</td>'
                . '<td>'.$row[10].'</td>'
                . '<td>'.$row[12].'</td>'                
                . '<td>'.$row[11].'</td>'
                . '</tr>';
        
    }
    $option .='</table>';
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=download.xls");
    echo $option;
}
