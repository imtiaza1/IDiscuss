<?php
include('_connection.php');
session_start();
session_unset();
session_destroy();
echo "hello world";
header('location: /forum/index.php');
