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

// Retrieve the room ID from the query parameter
if (isset($_GET['room_id'])) {
  $roomId = $_GET['room_id'];

  // Prepare and execute the SQL DELETE statement
  $stmt = $conn->prepare("DELETE FROM room WHERE room_id = ?");
  $stmt->bind_param("i", $roomId);
  $stmt->execute();

  // Check if the room was successfully deleted
  if ($stmt->affected_rows > 0) {
    echo "Room deleted successfully.";
  } else {
    echo "Failed to delete room.";
  }

  // Close the prepared statement
  $stmt->close();
} else {
  echo "Invalid Room ID.";
}

// Close the database connection
$conn->close();

// Redirect back to room.php
header("Location: room.php");
exit();
