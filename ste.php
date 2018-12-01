<?php

session_start();

include 'connection.php';
$deptID=$_POST["deptid"];
$year=$_POST["year"];
$deptID= substr($deptID, 0, 1);

//echo $deptID."     ".$year;

$query = mysqli_query($con, "SELECT student_info.ID_stud,student_info.fst_name,student_info.lst_name,student_info.dob,student_info.age, student_info.email_id, student_info.mobile_no, student_info.address,student_info.city, student_info.country,student_info.reg_date,dept_info.dept_name,person_type.name,sem_info.sem_code FROM student_info,dept_info,sem_info,person_type WHERE student_info.ID_dept=dept_info.ID_dept AND student_info.ID_sem
=sem_info.ID_sem AND person_type.ID_per_type=student_info.ID_per_type AND student_info.ID_dept='$deptID' AND student_info.reg_date LIKE '%$year%'");

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
            . 'Semester Name'
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
                . '<td>'.$row[5].'</td>'
                . '<td>'.$row[6].'</td>'
                . '<td>'.$row[7].'</td>'
                . '<td>'.$row[8].'</td>'
                . '<td>'.$row[9].'</td>'
                . '<td>'.$row[10].'</td>'
                . '<td>'.$row[11].'</td>'
                . '<td>'.$row[13].'</td>'
                . '<td>'.$row[12].'</td>'
                . '</tr>';
        
    }
    $option .='</table>';
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=download.xls");
    echo $option;
}
