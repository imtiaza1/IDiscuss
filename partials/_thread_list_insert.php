<?php
include('_connection.php');
$ShowAlert = false;
if (isset($_POST['submit'])) {
    $catID = $_GET['catID'];
    $thread_title = $_POST['title'];
    $thread_desc = $_POST['desc'];
    $thread_title = strip_tags($_POST['title']);
    $thread_desc = strip_tags($_POST['desc']);

    $sno = $_POST['sno'];
    $insert = "INSERT INTO `threads` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) VALUES ( '$thread_title', '$thread_desc', '$catID', '$sno');";
    $sql = mysqli_query($con, $insert);
    if ($sql) {
        $ShowAlert = true;
    } else {
        echo "error";
        $ShowAlert = false;
    }
}
