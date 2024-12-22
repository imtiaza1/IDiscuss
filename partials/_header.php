<?php
session_start();
include('partials/_signup_insert.php');
include('partials/_loginHandle.php');
include('partials/_connection.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Idiscuss</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container">

        <?php
        if ($successAlert) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert"  style="margin: 0;">
            <strong><i class="fa-solid fa-circle-check"></i></strong> 
            you are login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        if ($errorAlert) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"  style="margin: 0;">
            <strong><i class="fa-solid fa-triangle-exclamation"></i></strong> password or email is not correct!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if ($emailIsNotFound) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert"  style="margin: 0;">
            <strong><i class="fa-solid fa-triangle-exclamation"></i></strong>email is not found! please signup and login?
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        if ($emailAlert) {
            echo '<div class="alert alert-primary alert-dismissible fade show" role="alert" style="margin: 0;">
            <strong><i class="fa-solid fa-circle-exclamation"></i></strong> email already exits.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        if ($passAlert) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin: 0;">
            <strong><i class="fa-solid fa-triangle-exclamation"></i></strong> password does not match.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        if ($signUpAlert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 0;">
            <strong><i class="fa-solid fa-circle-check"></i></strong> your successfully signup iDisscus
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-sticky top-0 z-3">
        <div class="container-fluid">
            <a class="navbar-brand " href="index.php">IDiscuss</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active " aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            top categories
                        </a>
                        <ul class="dropdown-menu">
                            <?php
                            $sql = mysqli_query($con, "SELECT cat_id , cat_title FROM categories limit 3");
                            while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                                <li><a class="dropdown-item" href="threads_list.php?catID=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_title']; ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">about</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" aria-expanded="false">
                            contact
                        </a>
                    </li>
                </ul>
                <form action="\forum\search.php" method="get" class="d-flex" role="search ">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" name="submit1" type="submit">Search </button>
                    <?php
                    if (isset($_SESSION['user']) && $_SESSION['user'] == true) {
                    ?>
                        <button type="button" class="btn btn-outline-success mx-2"><?php echo $_SESSION['name']; ?></button>
                        <a href="partials/_logout.php" class="btn btn-outline-success mx-2">logout</a>
                    <?php } else {
                    ?>
                        <button type="button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">login</button>
                        <button type="button" class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal1">signup</button>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div>
    </nav>