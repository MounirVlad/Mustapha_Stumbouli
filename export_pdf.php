<?php
require('fpdf/fpdf.php');
require('vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teacher-room";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the assignment_teacher table
$query = "SELECT * FROM assignment_teacher";
$result = mysqli_query($connection, $query);

// Create PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);

// PDF table headers
$pdf->Cell(40, 10, 'Teacher Name', 1, 0, 'C');
$pdf->Cell(40, 10, 'Day', 1, 0, 'C');
$pdf->Cell(40, 10, 'Schedule Value', 1, 0, 'C');
$pdf->Cell(40, 10, 'Room Name', 1, 0, 'C');
$pdf->Cell(40, 10, 'Room Machines', 1, 1, 'C');

// PDF table data
while ($row = mysqli_fetch_assoc($result)) {
  $pdf->Cell(40, 10, $row['teacher_name'], 1, 0, 'C');
  $pdf->Cell(40, 10, $row['day'], 1, 0, 'C');
  $pdf->Cell(40, 10, $row['schedule_value'], 1, 0, 'C');
  $pdf->Cell(40, 10, $row['room_name'], 1, 0, 'C');
  $pdf->Cell(40, 10, $row['room_machines'], 1, 1, 'C');
}

// Output PDF
$pdf->Output('assignment_teacher.pdf', 'D');

// Create Excel
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Excel table headers
$sheet->setCellValue('A1', 'Teacher Name');
$sheet->setCellValue('B1', 'Day');
$sheet->setCellValue('C1', 'Schedule Value');
$sheet->setCellValue('D1', 'Room Name');
$sheet->setCellValue('E1', 'Room Machines');

// Excel table data
$rowCount = 2;
mysqli_data_seek($result, 0); // Reset result pointer
while ($row = mysqli_fetch_assoc($result)) {
  $sheet->setCellValue('A' . $rowCount, $row['teacher_name']);
  $sheet->setCellValue('B' . $rowCount, $row['day']);
  $sheet->setCellValue('C' . $rowCount, $row['schedule_value']);
  $sheet->setCellValue('D' . $rowCount, $row['room_name']);
  $sheet->setCellValue('E' . $rowCount, $row['room_machines']);
  $rowCount++;
}

// Apply borders to Excel cells
$styleArray = [
  'borders' => [
    'outline' => [
      'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
      'color' => ['rgb' => '000000'],
    ],
  ],
];
$sheet->getStyle('A1:E' . ($rowCount - 1))->applyFromArray($styleArray);

// Save Excel file
$writer = new Xlsx($spreadsheet);
$writer->save('assignment_teacher.xlsx');

// Close connection
mysqli_close($connection);
