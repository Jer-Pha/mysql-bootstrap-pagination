<?php header('Content-Type: text/html; charset=utf-8');

$server = 'example_server';
$username = 'example_username';
$password = 'example_password';
$database = 'example_database';

// Create connection
$conn = mysqli_connect($server, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Optional
$conn->set_charset('utf8');

// EOF
