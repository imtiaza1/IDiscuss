<?php
include('partials/_header.php');
include('partials/_login.php');
include('partials/_signup.php');
include('partials/_connection.php');

?>
<div class="container text-start">
    <div class="container">
        <div class="jumbotron" style="background: rgb(91%, 93%, 94%);
            padding: 3rem;">
            <?php
            if (isset($_GET['submit1'])) {
                $search = $_GET['search'];
            ?>
                <h2 class="display-5">search result for <b style="text-transform: uppercase;"><?php echo $search;  ?></b></h2>
                <?php
                $sql = mysqli_query($con, "SELECT * FROM threads WHERE MATCH(thread_title,thread_desc)against('$search')");
                $sql2 = mysqli_query($con, "SELECT * FROM categories WHERE MATCH(cat_title,cat_description)against('$search')");
                $succes = false;
                $result = mysqli_num_rows($sql);
                $result2 = mysqli_num_rows($sql2);
                if ($result) {
                    $succes = true;
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $thread_id = $row['thread_id'];
                        $threads_title = $row['thread_title'];
                        $threads_desc = $row['thread_desc'];
                ?>
                        <hr class="my-4">
                        <h4 class=""><a href="threads.php?threadID=<?php echo $thread_id; ?>"><?php echo $threads_title; ?></a></h4>
                        <p class="lead"><?php echo  $threads_desc; ?></p>
                <?php
                    }
                }
                ?>
                <hr class="my-4">
                <div class="row row-cols-1 row-cols-md-3 g-4 pt-3">
                    <?php
                    if ($result2) {
                        $succes = true;
                        while ($row = mysqli_fetch_assoc($sql2)) {
                            $cat_id = $row['cat_id'];
                            $cat_title = $row['cat_title'];
                            $cat_desc = $row['cat_description'];
                            $short_cat_desc = substr($cat_desc, 0, 50);
                    ?>
                            <div class="col">
                                <div class="card">
                                    <img src="images/image1.jpg" style="height: 35vh;" class="card-img-top" alt="Hollywood Sign on The Hill" />
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $cat_title; ?></h5>
                                        <p class="card-text">
                                            <?php echo $short_cat_desc ?>
                                        </p>
                                        <a href="threads_list.php?catID=<?php echo $cat_id; ?>" class="btn btn-outline-success">view threads</a>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>

            <?php
            }
            if (!$succes) {
                $succes = false;
            ?>
                <hr class="my-4">
                <h4 class="lead">No threads found!</h4>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
include('partials/_footer.php');
?>