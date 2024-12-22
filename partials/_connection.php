<?php
$username = 'root';
$server = 'localhost';
$password = '';
$database = 'forum';
$con = mysqli_connect($server, $username, $password, $database);
if (!$con) {
    echo "Error" . mysqli_connect_error();
    exit;
}
