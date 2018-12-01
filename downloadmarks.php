<?php
require_once 'Classes/PHPExcel.php';


$objPHPExcel = new PHPExcel();
for ($col = 'A'; $col != 'H'; $col++) {    
    $objPHPExcel->getActiveSheet()->getStyle($col.'1')->getFont()->setBold(true);
}
$objPHPExcel->getActiveSheet()->setCellValue('A1', 'Sl_No.');
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Student ID');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Frist Name');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Last Name');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Subject ID');
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Marks Obtain');
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Date');

$objPHPExcel->getActiveSheet()->setTitle('Marks Detail');

/**autosize*/
for ($col = 'A'; $col != 'M'; $col++) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
}




header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="MarksDetails.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
?>