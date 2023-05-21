<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teacher-room";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$room_number = $_POST['room_number'];
$room_name = $_POST['room_name'];
$machines = $_POST['machines'];
$capacity = $_POST['capacity'];

$sql = "INSERT INTO room (room_number, room_name, machines, capacity) VALUES ('$room_number', '$room_name', '$machines', '$capacity')";

if ($conn->query($sql) === true) {
  header("Location: room.php");
  exit();
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
