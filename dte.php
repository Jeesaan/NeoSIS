<?php

session_start();

include 'connection.php';
if(isset($_POST['deptreport'])){

$query = mysqli_query($con, "Select * from dept_info");

$option ="";
if (mysqli_num_rows($query) > 0){
    $option .='<table class="table" bordered=1>'
            . '<tr>'
            . '<th>'
            . 'ID'
            . '</th>'
            . '<th>'
            . 'Department Name'
            . '</th>'
            . '<th>'
            . 'Department Abbreviation Name'
            . '</th>';
    while ($row = mysqli_fetch_array($query)) {
        $option .='<tr>'
                . '<td>'.$row[0].'</td>'
                . '<td>'.$row[1].'</td>'
                . '<td>'.$row[2].'</td>';
        
    }
    $option .='</table>';
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=department.xls");
    echo $option;
}
}
