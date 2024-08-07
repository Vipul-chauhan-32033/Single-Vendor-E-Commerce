<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <a class="navbar-brand" href="index.php"><img src="assets/img/<?= $sitesettingdata['logo'] ?>" alt="" /></a>
    <div class="d-flex icon align-items-center">

        <a href="#" class="whichlist  navbar-toggler text-center" type="button" data-toggle="collapse" data-target=""
            aria-controls="" aria-expanded="false">
            <i class="fa-solid fa-magnifying-glass" id="search_icon"></i>
            <!-- <p>Whishlist</p> -->

            <div class="search" id="search_bar">
                <form action="search.php" method="GET" enctype="multipart/form-data">

                    <input class="search-bar" type="search" name="query" style="padding-left: 10px;" />
                    <button type="submit">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>

        </a>
        <a href="whishlist.php" class="whichlist  navbar-toggler text-center" type="button" data-toggle="collapse"
            data-target="whishlist.php" aria-controls="whishlist.php" aria-expanded="false">
            <i class="fa-regular fa-heart"></i>
            <!-- <p>Whishlist</p> -->
        </a>
        <a href="cart.php" class="whichlist navbar-toggler text-center" type="button" data-toggle="collapse"
            data-target="cart.php" aria-controls="cart.php" aria-expanded="false">
            <i class="fas fa-cart-shopping"></i>
            <!-- <p>Cart</p> -->


        </a>
        <?php
        if (!isset($_SESSION['logged_in'])) {
            ?>
            <!-- <a href="profile.php" class="whichlist  navbar-toggler text-center" type="button" data-toggle="collapse"
                data-target="profile.php" aria-controls="cart.php" aria-expanded="false">
                <i class="fa-regular fa-user"></i>
                <p>Profile</p> -->
            <div class="dropdown show border-none dropleft whichlist  navbar-toggler text-center">
                <a class="btn btn-secondary toggle bg-light" href="#" role="button" id="dropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="Right-aligned menu">
                    <i class="fa-solid fa-ellipsis-vertical"></i>

                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item active" href="login.php">Login</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="register.php">Sign Up</a>
                </div>
            </div>

            </a>
        <?php } else { ?>
            <a href="profile.php" class="whichlist  navbar-toggler p-0" type="button" data-toggle="collapse"
                data-target="profile.php" aria-controls="cart.php" aria-expanded="false">
                <img class="img-fluid loaded rounded-circle" src="uploads/<?php if (isset($_SESSION['u_img'])) {
                    echo $_SESSION['u_img'];
                } ?>" data-src="uploads/<?php if (isset($_SESSION['u_img'])) {
                     echo $_SESSION['u_img'];
                 } ?>" width="26" height="26 " loading="lazy" data-ll-status="loaded">
            </a>

        <?php } ?>
        </a>
        <button class="navbar-toggler border-none px-4 pb-2" type="button" data-toggle="collapse"
            data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon m-n5 "></span>
        </button>
    </div>

    <div class="collapse navbar-collapse justify-content-between" id="navbarMenu">
        <ul class="navbar-nav px-12 ml-4">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item ">
                <a href="shop.php" class="nav-link " style="color:#000">Shop <i class="fa-solid fa-caret-down"></i> </a>
                <div class="mega-box">
                    <div class="content">
                        <div class="row">
                            <img src="assets/img/men/m1.png" alt="not image">
                        </div>
                        <div class="row">

                            <ul class="mega-links">
                                <li>
                                    <header>Mens</header>
                                </li>
                                <li><a href="shop.php#men">Shirt</a></li>
                                <li><a href="shop.php#men">Pant's</a></li>
                                <li><a href="shop.php#men">T-Shirt</a></li>
                                <li><a href="shop.php#men">Trousers</a></li>
                            </ul>
                        </div>
                        <div class="row">

                            <ul class="mega-links">
                                <li>
                                    <header>Womens</header>
                                </li>
                                <li><a href="shop.php#women">Sarees</a></li>
                                <li><a href="shop.php#women">Dresses</a></li>
                                <li><a href="shop.php#women">Skirt</a></li>
                                <li><a href="shop.php#women">Kurti</a></li>
                            </ul>
                        </div>
                        <div class="row">

                            <ul class="mega-links">
                                <li>
                                    <header>kids</header>
                                </li>
                                <li><a href="shop.php#kid">Shirt</a></li>
                                <li><a href="shop.php#kid">Pant's</a></li>
                                <li><a href="shop.php#kid">T-Shirt</a></li>
                                <li><a href="shop.php#kid">Shorts</a></li>
                            </ul>
                        </div>

                    </div>
                </div>


                <!-- <a class="nav-link dropdown-toggle" href="shop.php" role="button" data-toggle="dropdown"
                    aria-expanded="false" style="color: #000">
                    Shop
                </a> -->
                <!-- <div class="dropdown-menu mt-3">
                    <div class="d-flex">
                        <a class="dropdown-item" href="shop.php#men"><b>Mens</b>
                            <div class="pt-2">
                                <p>Pants</p>
                                <p>T-Shirt</p>
                                <p>Shirt</p>
                                <p>Trousers</p>
                            </div>
                        </a>
                        <a class="dropdown-item" href="shop.php#women"><b>Women</b>
                            <div class="pt-2">
                                <p>Sarees</p>
                                <p>Dresses</p>
                                <p>Skirt</p>
                                <p>kurtis</p>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="shop.php#kid"><b>Kids</b>
                            <div class="pt-2">
                                <p>Pants</p>
                                <p>T-Shirt</p>
                                <p>Shirt</p>
                                <p>Shorts</p>
                            </div>
                        </a>
                    </div>
                </div> -->
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="contact.php">Contact Us<span class="sr-only"></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="about.php">About Us <span class="sr-only"></span></a>
            </li>
        </ul>
        <!-- <form class="form-inline my-2 my-lg-0 d-flex">
            <input class="form-control mr-sm-2" type="search" placeholder="Search Product's" aria-label="Search" />
            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>
        </form> -->
        <div class="nav-icon mx-1">
            <div class="icon d-flex align-items-center">
                <!-- <a href="#" name="whishlist"> -->
                <div class="search" style="">
                    <form action="search.php" method="GET" enctype="multipart/form-data">

                        <input class="search-bar" type="search" name="query" style="padding-left: 2px;" value="<?php if (isset($_GET['query']))
                            echo $_GET['query']; ?>" />
                        <button type="submit">
                            <div class="whichlist p-2">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </button>
                    </form>
                </div>
                <!-- </a> -->
                <a href="whishlist.php" name="whishlist">
                    <div class="whichlist p-2">
                        <i class="fa-regular fa-heart"></i>
                        <!-- <p>Whishlist</p> -->
                    </div>
                </a>

                <a href="cart.php" name="cart">
                    <div class="cart-icon p-2">
                        <i class="fas fa-cart-shopping"></i>
                        <!-- <p>Cart</p> -->
                    </div>
                </a>
                <?php
                if (!isset($_SESSION['logged_in'])) {
                    ?>
                    <!-- <a href="login.php">
                        <div class="profile-icon p-2"> -->
                    <!-- <i class="fa-solid fa-ellipsis-vertical"></i> -->
                    <!-- <i class="fa-regular fa-user"></i> -->
                    <!-- <p>Profile</p> -->
                    <!-- </div>
                    </a> -->

                    <div class="dropdown show border-none dropleft">
                        <a class="btn btn-secondary toggle bg-light" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="Right-aligned menu">
                            <i class="fa-solid fa-ellipsis-vertical"></i>

                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item active" href="login.php">Login</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="register.php">Sign Up</a>
                        </div>
                    </div>
                <?php } else { ?>
                    <a href="profile.php">
                        <div class="profile-icon p-2">
                            <img class="img-fluid loaded rounded-circle" src="uploads/<?php if (isset($_SESSION['u_img'])) {
                                echo $_SESSION['u_img'];
                            } ?>" data-src="uploads/<?php if (isset($_SESSION['u_img'])) {
                                 echo $_SESSION['u_img'];
                             } ?>" alt="Logo Brand" width="26" height="26 " loading="lazy" data-ll-status="loaded">
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>


<!-- Navigation Bar -->

<script>
    let search_bar = document.getElementById("search_bar");
    let search_icon = document.getElementById("search_icon");


    search_icon.addEventListener("click", () => {

        // search_bar.style.visibility ? "visible": "hidden";
        if (search_bar.style.visibility === "visible") {
            search_bar.style.visibility = "hidden";
        } else {
            search_bar.style.visibility = "visible";
        }
    })

</script>