<?php
session_start(); // Make sure session is started before using $_SESSION

$successAlert = false;
$errorAlert = false;
$emailIsNotFound = false;

if (isset($_POST['loginSubmit'])) {
    include('_connection.php');

    // Sanitize input
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = $_POST['pass'];

    // Check if email exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($pass, $user['pass'])) {
            $_SESSION['user'] = true;
            $_SESSION['name'] = $user['name'];
            $_SESSION['id'] = $user['id'];
            $successAlert = true;

            // Optional: Redirect after login
            // header('Location: dashboard.php');
            // exit();
        } else {
            $errorAlert = true; // Incorrect password
        }
    } else {
        $emailIsNotFound = true; // No user with this email
    }
}
?>
