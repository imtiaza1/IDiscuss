<?php
include('partials/_header.php');
include('partials/_login.php');
include('partials/_signup.php');
include('partials/_connection.php');
include('partials/_cat_get.php');
include('partials/_threads_select.php');
include('partials/_thread_list_insert.php');

?>
<div class="container">
    <div class="jumbotron" style="background: rgb(91%, 93%, 94%);
            padding: 3rem;">
        <h2 class="display-4">Wellcome to <b style="text-transform: uppercase;"><?php echo $cat_title; ?></b> forum</h2>
        <p class="lead"><?php echo $cat_desc; ?></p>
        <hr class="my-4">
        <p>--Be respectful and courteous to others.
            --Keep discussions focused on coding.
            -Avoid irrelevant or promotional posts.
            --Provide specific and constructive feedback.
            --Give credit for others' work; no plagiarism.
            --Don't post the same question in multiple sections.
            --Format code with code tags for readability.</p>
        <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
    </div>
</div>
<div class="container pt-4 ">
    <?php
    if ($ShowAlert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your threads been add below.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> 
        </div>';
    } else {
        $ShowAlert = false;
    }
    ?>
    <h2>
        Browse question
        <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            add
        </button>
    </h2>
    <?php
    if (isset($_SESSION['user']) && $_SESSION['user'] == true) {
        echo '
        <div class="collapse" id="collapseExample">
            <div class="card card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">title</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="...">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">discription</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
                        <input type="hidden" name="sno" value="' . $_SESSION["id"] . '">
                        <input type="submit" name="submit" class="btn btn-success mt-2" value="submit">
                </form>
            </div>
        </div>
        ';
    } else {
        echo '
            <div class="collapse" id="collapseExample">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>HI!</strong> please login to add question!.
            </div>
        ';
    } ?>
</div>

<!-- select * from thread database; -->
<?php
$get_id = $_GET['catID'];
$result = mysqli_query($con, "SELECT * FROM `threads` WHERE thread_cat_id=$get_id");
if (!$result || mysqli_num_rows($result) == 0) {
    echo '
        <div class="jumbotron" style="background: #e8edf0; padding: 3rem;"
            <hr class="my-4">
            <h4 class="lead">HI! To add a question, please click "Add" as there is no existing thread.</h4>
        </div>
    ';
} else {
    while ($row = mysqli_fetch_row($result)) {
        $thread_id = $row['0'];
        $thread_title = $row['1'];
        $thread_desc = $row['2'];
        $thread_user_id = $row['4'];
        $thread_time = $row['5'];
        $short_thread_desc = substr($thread_desc, 0, 50);
        $sql = mysqli_query($con, "select name from users where id=$thread_user_id");
        while ($row = mysqli_fetch_array($sql)) {
            $name = $row['name'];
        }
?>
        <div class="media my-3" style="display: flex; align-items:center;">
            <img class="mr-3 p-1" style="height: 60px;  " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAANAAAACUCAMAAADVs1c8AAAAMFBMVEXk5ueutLenrbDn6eqrsbTq7O2yt7rQ09Xg4uPY29y5vsG1ur3AxcfHy83U19nb3t/kFW1hAAAFB0lEQVR4nO2dbXejIBBG1QFF5OX//9sFk7YxTWqAx8zY7f3W3T1nuWdgYBBo1x0N6c6EKROCIU2H/4fHMnurhmFQiSGjrJ+521QJpcA4lVT6DUmsd8Fwt64YMtGPw53Mp9QwpjidqfNRDs4Tm6tT786jRF1w/Y86H0rnMCLjx12dVWnx5gRKFOwrNquRskG+0YvhuSqNXnM3eAdXoLMqWdExorFMJzMKznZUGB7xRlU+aSAJNTJ1Pjl/y0zfS6VPzgwSF3cvTz+PjBx3679BvsEnGXlugTsoVCTsW8bArbCBoq3NCB8hspFbYoNv9BHW6Si06mQE1eamtcNllOXW+GIC+CQjKSEi0zIF3TBKWS8ESID6fhASIrOAhPpRRrU3DyCffpAxF5UWqc9RVkSIYD4pRBLSwgTrcSlEE78RISbVTxb+Ple3j/AMxR8hXI5bhdh3HgmX41Ycd5/TjYXdPeyDSEN7XN6kY8aAhXruxUJACzHPRLq99r6D+XOEdmAf7jSnQbXdF8zr0wOEmMcQeBpKE9Gf0J/Q/yVU/1HoCdxJ4S9t78E9sf62lQJhtrVv8MwlK7YCT7DX4L+tHtLgLsf+BQI9EbFvBhO2wlP8x80idl+O/9jmr9s5xe40sg+hDrvvM7DPQhnk9yEBAULmOcW+s72Cy3ODkGNzsE9eElJCZgYJiTlKAvoOLuiwD+QwlqAAdQYRIknnTmluPx2jRu5KaAPgROPE7bCh+QigckLmoCsU2jqdGvnrhi2N57a5v0Q+gFp26JQT55MP/TT4cDf+IVQ7jNISQWCAMnVGysq8bZNCVHXUTK5PvpJbPo7S+BHrk/H7d4w3Or0n0T5dN5UMJLXIm3/uobhzr/1GR53iOjiZF4OUwiM3HWwxL4ykNHpkLUd/xnj1417QoE6l0+UMPvXPX7zoJ9m5+iGko0vj/l5K5b521sdjtDbBjReNi9niJqOF7L7VQTpFI87ruz7x8tO5obTCu4W7PbVc2m6MiTHOX6Sf0p99/PVJyG01cQ7T5J1zdlmuQygPonGx1jnvpzDH1Yu7sXusLiGZ2OUq8T3JXf50tKtX7OTGijTFkIJixwcej2aj9I+WpJWkBGYK0t08XeOy77KxyrEKwmYm3YUUmL7M5UYqja08Pwlx0mlFMI5ldd13qZQw7NQJmHJ154HHTu3MGybSs63sZ09Q48SX9YjCiD5cdiksmJRSfQDXySiWWslMB0TnS8nFtxZMedvgWfWGUvLvU0rFKDgVPFTqfXyLEdHsj9dZlew7CvWXHyxEGPXu6NNZKVO/obfdKC3+0CBR2YOFEOyBm6sU4Tcd9slrh6N8wtvDc+GgDy7gA80FHPPJktxxK4NdI/zJQMKd8qtiAKcGwr3dU2sEnZHINBakAJCHmygypbetEewBOsRpOAigCYmiEJ8eM8US5DU8DCMgM1AHvwfZwNKevVvPwWFRtrXoo4nbYUtrqpOTED5onY7A7yoBUE2dDvnUGoimCwWRu/WPGOo7HeQGAB5VXUugrtGAqT9CLGeJsGWoywsEf/YKReVjm9Wnlo+nqn4l+EsJOKpCpOUGqDLRyQ1QX/NyCf7hOCjlLx9iL+HjKS5ehU6qn5SmBfx7PWCWwgBp7gbvUbq9YLgbvEvZ4yXSKu/vFP6qLPFDqPQ3/OAfJYNTtqNF8Hfw4JRto0b4S4V4Sp45o/m3CU2XXwcrGol3eQ/gH+J9S5mArfx5AAAAAElFTkSuQmCC" alt="Generic placeholder image">
            <div class="media-body align-center mx-3">
                <p style="margin: 0; font-size: 14px;">
                    <?php echo  $name . " : " . $thread_time; ?>
                </p>
                <h6 class="m-0">
                    <a href="threads.php?threadID=<?php echo $thread_id; ?>"><?php echo $thread_title; ?></a>
                </h6>
                <p style="margin: 0; font-size: 14px;">
                    <?php echo $short_thread_desc;
                    echo "<hr>" ?>
                </p>
            </div>
        </div>

<?php
    }
}
?>




<?php
include('partials/_footer.php');
?>