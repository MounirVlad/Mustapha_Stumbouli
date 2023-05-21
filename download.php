<?php
require_once('fpdf/fpdf.php');

// Fetch unassigned rooms from the database and assign them to $unassignedRooms variable
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teacher-room";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Perform a database query to fetch unassigned rooms
$query = "SELECT * FROM room WHERE room_id NOT IN (SELECT room_id FROM assignment)";
$result = mysqli_query($conn, $query);

// Check if any unassigned rooms were found
if ($result && mysqli_num_rows($result) > 0) {
  $unassignedRooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
  $unassignedRooms = array(); // Empty array if no unassigned rooms found
}

mysqli_close($conn);

// Create PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Unassigned Rooms List');

$pdf->Ln(20);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'Room ID', 1);
$pdf->Cell(40, 10, 'Room Number', 1);
$pdf->Cell(40, 10, 'Room Name', 1);
$pdf->Cell(30, 10, 'Machines', 1);
$pdf->Cell(30, 10, 'Capacity', 1);

$pdf->SetFont('Arial', '', 12);
foreach ($unassignedRooms as $room) {
  $pdf->Ln();
  $pdf->Cell(30, 10, $room['room_id'], 1);
  $pdf->Cell(40, 10, $room['room_number'], 1);
  $pdf->Cell(40, 10, $room['room_name'], 1);
  $pdf->Cell(30, 10, $room['machines'], 1);
  $pdf->Cell(30, 10, $room['capacity'], 1);
}

// Output PDF
$pdf->Output('D', 'unassigned_rooms_list.pdf');
