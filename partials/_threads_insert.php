<?php
include('_connection.php');
$ShowAlert = false;

if (isset($_POST['submit'])) {
    // Validate and sanitize inputs
    $thread_id = isset($_GET['threadID']) ? (int)$_GET['threadID'] : 0;
    $comments = strip_tags(trim($_POST['comments']));
    $sno = isset($_POST['sno']) ? (int)$_POST['sno'] : 0;

    // Basic validation
    if ($thread_id > 0 && $sno > 0 && !empty($comments)) {
        $insert = "INSERT INTO `comments` (`comments_content`, `threads_id`, `comments_by`, `comments_time`) 
                   VALUES ('$comments', '$thread_id', '$sno', current_timestamp())";

        $sql = mysqli_query($con, $insert);

        if ($sql) {
            $ShowAlert = true;
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Invalid input data.";
    }
}
?>
