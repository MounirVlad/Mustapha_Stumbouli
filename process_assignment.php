<?php
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

// Retrieve the selected IDs from the form
$teacherId = $_POST['teacher'];
$teacher_scheduleId = $_POST['teacher_schedule'];
$roomId = $_POST['room'];

// Insert the selected IDs into the assignment table
$insertQuery = "INSERT INTO assignment (teacher_id, schedule_id, room_id) VALUES ('$teacherId', '$teacher_scheduleId', '$roomId')";
if (mysqli_query($connection, $insertQuery)) {
  // Redirect to the assignmentlist.php page
  header("Location: assignment.php");
  exit();
} else {
  echo "Error: " . $insertQuery . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
