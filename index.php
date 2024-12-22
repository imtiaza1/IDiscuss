<?php
include('partials/_header.php');
include('partials/_login.php');
include('partials/_signup.php');
include('partials/_connection.php');

?>
<div id="carouselExampleDark" class="carousel carousel-dark slide">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="https://plus.unsplash.com/premium_photo-1661369089329-d89031837cdf?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8Y29kaW5nfGVufDB8fDB8fHww" class="d-block w-100 " style="height: 60vh; object-fit:cover" alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="https://plus.unsplash.com/premium_photo-1661369089329-d89031837cdf?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8Y29kaW5nfGVufDB8fDB8fHww" class="d-block w-100" style="height: 60vh; object-fit:cover" alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y29kaW5nfGVufDB8fDB8fHww" class="d-block w-100" style="height: 60vh; object-fit:cover" alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container text-center pt-3 pb-5">
    <h2>iDisscuss - Browse Categories</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4 pt-3">
        <!-- select categories from database; -->
        <?php
        $result = mysqli_query($con, "SELECT * FROM `categories`");

        while ($row = mysqli_fetch_row($result)) {
            $cat_id = $row['0'];
            $cat_title = $row['1'];
            $cat_desc = $row['2'];
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

        ?>
    </div>
</div>
<?php
include('partials/_footer.php');
?>