<?php
include('_connection.php');
$ShowAlert = false;

if (isset($_POST['submit'])) {
    // Sanitize and validate input
    $catID = isset($_GET['catID']) ? (int)$_GET['catID'] : 0;
    $thread_title = strip_tags(trim($_POST['title']));
    $thread_desc  = strip_tags(trim($_POST['desc']));
    $sno = (int)$_POST['sno'];

    // Prepare insert query
    $insert = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`) 
               VALUES ('$thread_title', '$thread_desc', '$catID', '$sno')";

    // Execute and check result
    if (mysqli_query($con, $insert)) {
        $ShowAlert = true;
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>
