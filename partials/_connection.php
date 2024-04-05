<?php
// Database connection settings
$server   = 'localhost';
$username = 'root';
$password = '';
$database = 'forum';

// Create connection
$con = mysqli_connect($server, $username, $password, $database);

// Check connection
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
