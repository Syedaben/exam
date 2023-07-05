<?php
// Database configuration
$hostname = 'your_hostname';
$username = 'your_username';
$password = 'your_password';
$database = 'your_database';

// Create a new MySQLi object
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($mysqli->connect_errno) {
  die('Failed to connect to MySQL: ' . $mysqli->connect_error);
}

// Function to sanitize input data
function sanitize($data) {
  global $mysqli;
  return $mysqli->real_escape_string($data);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form input data
  $name = sanitize($_POST['name']);
  $gender = sanitize($_POST['gender']);
  $email = sanitize($_POST['email']);
  $address = sanitize($_POST['address']);

  // Insert data into the "register" table
  $insertQuery = "INSERT INTO register (name, gender, email, address) VALUES ('$name', '$gender', '$email', '$address')";

  if ($mysqli->query($insertQuery)) {
    echo "Data inserted successfully!";
  } else {
    echo "Error: " . $mysqli->error;
  }

  // Close the database connection
  $mysqli->close();
}
?>