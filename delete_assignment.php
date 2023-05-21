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

// Retrieve the assignment ID from the query parameter
if (isset($_GET['id'])) {
  $assignmentId = $_GET['id'];

  // Prepare and execute the SQL DELETE statement
  $stmt = $conn->prepare("DELETE FROM assignment WHERE assignment_id = ?");
  $stmt->bind_param("i", $assignmentId);
  $stmt->execute();

  // Check if the assignment was successfully deleted
  if ($stmt->affected_rows > 0) {
    // Redirect back to assignment.php
    header("Location: assignment.php");
    exit();
  } else {
    echo "Failed to delete assignment.";
  }

  // Close the prepared statement
  $stmt->close();
} else {
  echo "Invalid assignment ID.";
}

// Close the database connection
$conn->close();
