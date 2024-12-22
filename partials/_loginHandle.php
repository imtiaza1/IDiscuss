<?php
$successAlert = false;
$errorAlert = false;
$emailIsNotFound = false;

if (isset($_POST['loginSubmit'])) {
    include('_connection.php');
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $select = "SELECT * FROM users WHERE email='$email'";
    $sql = mysqli_query($con, $select);
    $result = mysqli_num_rows($sql);
    if ($result > 0) {
        while ($row = mysqli_fetch_array($sql)) {
            // Check if the password is correct
            $cheackPass = password_verify($pass, $row['pass']);
            if ($cheackPass) {
                $_SESSION['user'] = true;
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                $successAlert = true;
            } else {
                $errorAlert = true;
            }
        }
    } else {
        $emailIsNotFound = true;
    }
}
