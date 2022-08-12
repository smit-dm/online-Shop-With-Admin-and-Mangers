<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = 'assignment5';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS " + $dbname;
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}


?>