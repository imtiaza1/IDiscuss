<?php
$signUpAlert = false;
$passAlert = false;
$emailAlert = false;

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['signSubmit'])) {
    include('_connection.php');
    $email = $_POST['email'];
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    //cheack if email already exits;

    $emailExists = "select * from users where email='$email'";
    $sql = mysqli_query($con, $emailExists);
    $result = mysqli_num_rows($sql);
    if ($result > 0) {
        $emailAlert = true;
    } else {

        // cheack if password match;

        if ($pass == $cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $insert = "INSERT INTO `users` (`name`,`email`, `pass`, `time`) VALUES ('$name','$email', '$hash', current_timestamp())";
            $sql = mysqli_query($con, $insert);
            if ($sql) {
                $signUpAlert = true;
            } else {
                echo "ERROR" . mysqli_connect_error();
            }
        } else {
            $passAlert = true;
        }
    }
}
