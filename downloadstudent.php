<?php
require_once 'Classes/PHPExcel.php';
$objPHPExcel = new PHPExcel();
for ($col = 'A'; $col != 'O'; $col++) {    
    $objPHPExcel->getActiveSheet()->getStyle($col.'1')->getFont()->setBold(true);
}
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Sl_No.');
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Frist Name');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Last Name');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'D.O.B');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Age');
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Mobile No.');
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Email_Id');
$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Address');
$objPHPExcel->getActiveSheet()->setCellValue('I1', 'City');
$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Country');
$objPHPExcel->getActiveSheet()->setCellValue('K1', 'Registration Date');
$objPHPExcel->getActiveSheet()->setCellValue('L1', 'Department ID');
$objPHPExcel->getActiveSheet()->setCellValue('M1', 'Person ID');
$objPHPExcel->getActiveSheet()->setCellValue('N1', 'Semester ID');
$objPHPExcel->getActiveSheet()->setTitle('Student Detail');

/**autosize*/
for ($col = 'A'; $col != 'O'; $col++) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
}




header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Student_Details.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>