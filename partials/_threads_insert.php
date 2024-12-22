<?php
include('_connection.php');
$ShowAlert = false;
if (isset($_POST['submit'])) {
    $thread_id = $_GET['threadID'];
    $comments = $_POST['comments'];
    $comments = strip_tags($_POST['comments']);

    $sno = $_POST['sno'];

    $insert = "INSERT INTO `comments` (`comments_content`, `threads_id`, `comments_by`, `comments_time`) VALUES ('$comments', '$thread_id', '$sno', current_timestamp());";
    $sql = mysqli_query($con, $insert);
    if ($sql) {
        $ShowAlert = true;
    } else {
        echo "error";
        $ShowAlert = false;
    }
}
