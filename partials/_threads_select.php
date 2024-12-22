<?php
include('_connection.php');
$show = false;
if (isset($_GET['catID'])) {
    $cat_id = $_GET['catID'];
    $result = mysqli_query($con, "SELECT * FROM `threads` WHERE thread_cat_id=$cat_id");

    while ($row = mysqli_fetch_row($result)) {
        $thread_id = $row['0'];
        $thread_title = $row['1'];
        $thread_desc = $row['2'];
        $short_thread_desc = substr($thread_desc, 0, 50);
    }
}
