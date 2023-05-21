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

// Retrieve the teacher ID from the query parameter
if (isset($_GET['id'])) {
  $teacherId = $_GET['id'];

  // Prepare and execute the SQL DELETE statement
  $stmt = $conn->prepare("DELETE FROM teacher WHERE id = ?");
  $stmt->bind_param("i", $teacherId);
  $stmt->execute();

  // Check if the teacher was successfully deleted
  if ($stmt->affected_rows > 0) {
    echo "Teacher deleted successfully.";
  } else {
    echo "Failed to delete teacher.";
  }

  // Close the prepared statement
  $stmt->close();
} else {
  echo "Invalid teacher ID.";
}

// Close the database connection
$conn->close();

// Redirect back to teacher.php
header("Location: teacher.php");
exit();
