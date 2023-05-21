<?php

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

// Retrieve form data
$FirstLastname = $_POST['First&Lastname'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone-num'];
$BestTime = $_POST['BestTime'];
$gender = $_POST['gender'];
$DateofBirth = $_POST['DateofBirth'];
$wilaya = $_POST['wilaya'];
$Baladia = $_POST['Baladia'];
$University = $_POST['University'];
$Rolle = $_POST['Role'];
$Number_students = $_POST['Number_students'];

// Retrieve the selected day values
$days = array(
  'Sun_8_10' => isset($_POST['Sun_8_10']) ? $_POST['Sun_8_10'] : 0,
  'Mon_8_10' => isset($_POST['Mon_8_10']) ? $_POST['Mon_8_10'] : 0,
  'Tue_8_10' => isset($_POST['Tue_8_10']) ? $_POST['Tue_8_10'] : 0,
  'Wed_8_10' => isset($_POST['Wed_8_10']) ? $_POST['Wed_8_10'] : 0,
  'Thu_8_10' => isset($_POST['Thu_8_10']) ? $_POST['Thu_8_10'] : 0,
);

// Prepare the SQL statement to insert data into the 'teacher' table
$stmt = $conn->prepare("INSERT INTO teacher (FirstLastname, Email, Phone, BestTime, gender, DateofBirth, Baladia, wilaya,  University, Rolle, Number_students) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssssss", $FirstLastname, $Email, $Phone, $BestTime, $gender, $DateofBirth, $Baladia, $wilaya, $University, $Rolle, $Number_students);
$stmt->execute();

// Get the inserted teacher ID
$teacherId = $stmt->insert_id;

// Prepare the SQL statement to insert data into the 'teacher_schedule' table
$stmt = $conn->prepare("INSERT INTO teacher_schedule (teacher_id, day, value) VALUES (?, ?, ?)");
$stmt->bind_param("iss", $teacherId, $day, $value);

// Insert the timetable data
foreach ($days as $day => $value) {
  $stmt->execute();
}

// Close the statement and database connection
$stmt->close();
$conn->close();

// Redirect or display a success message to the user
header("Location: teacher.php");
exit();
error_reporting(E_ALL);
ini_set('display_errors', 1);
