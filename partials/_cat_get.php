<?php
include('_connection.php');
if (isset($_GET['catID'])) {
    $cat_id = $_GET['catID'];
    $result = mysqli_query($con, "SELECT * FROM `categories` WHERE cat_id=$cat_id");

    while ($row = mysqli_fetch_row($result)) {
        $cat_id = $row['0'];
        $cat_title = $row['1'];
        $cat_desc = $row['2'];
    }
}
