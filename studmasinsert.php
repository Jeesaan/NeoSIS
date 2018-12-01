<?php

session_start();

include 'connection.php';

include 'Classes/PHPExcel/IOFactory.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_FILES['file'])){
    $file = $_FILES['file'];
    print_r($file);
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    echo $file_name;
    $extension =explode(".", $file_name );
    $allowed_extension = array("xls", "xlsx", "csv");
    $ext = end($extension);
    $objPHPExcel = PHPExcel_IOFactory::load($file_tmp);
    function convertSerialDate($date)	{
		$timestamp = ($date - 25569) * 86400;
		return date("d/m/Y",$timestamp);
	}
        if(in_array($ext, $allowed_extension)){
	
    foreach ($objPHPExcel->getWorksheetIterator() as $worksheet){
        $highestRow = $worksheet->getHighestRow();
        for($row=2; $row<=$highestRow; $row++){
            $a1 = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(1, $row)->getValue());
            $a2 = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(2, $row)->getValue());
            $a3 = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(3, $row)->getValue());
            $d1 = convertSerialDate($a3);
            $a4 = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(4, $row)->getValue());
            $a5 = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(5, $row)->getValue());
            $a6 = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(6, $row)->getValue());
            $a7 = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(7, $row)->getValue());
            $a8 = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(8, $row)->getValue());
            $a9 = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(9, $row)->getValue());
            $a10 = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(10, $row)->getValue());
            $d2 = convertSerialDate($a10);
            $a11 = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(11, $row)->getValue());
            $a12 = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(12, $row)->getValue());
            $a13 = mysqli_real_escape_string($con, $worksheet->getCellByColumnAndRow(13, $row)->getValue());
            if($a12 === 3){
            $sql ="INSERT INTO student_info (fst_name,lst_name,age,mobile_no,email_id,city,country,address,ID_dept,ID_sem,ID_per_type,dob,reg_date) VALUES('".$a1."','".$a2."','".$a4."','".$a6."','".$a5."','".$a8."','".$a9."','".$a7."','".$a11."','".$a13."','".$a12."','".$d1."','".$d2."');";
            } else {
                $sql ="INSERT INTO student_info (fst_name,lst_name,age,mobile_no,email_id,city,country,address,ID_dept,ID_per_type,dob,reg_date) VALUES('".$a1."','".$a2."','".$a4."','".$a6."','".$a5."','".$a8."','".$a9."','".$a7."','".$a11."','".$a12."','".$d1."','".$d2."');";
            }
            if(mysqli_query($con, $sql)=== true){
                echo 'successfull';
            }
            
        }
    }
        } else {
            echo $con->error;
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
   //echo $a1.' '.$a2.' '.$d1.' '.$a4.' '.$a5.' '.$a6.' '.$a7.' '.$a8.' '.$a9.' '.$d2.' '.$a11.' '.$a12.' '.$a13;
}
