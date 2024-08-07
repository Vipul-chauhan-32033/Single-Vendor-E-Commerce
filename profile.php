<?php
session_start();

include "server/connection.php";

// if user is not loggin then return to login page
if (!isset($_SESSION['logged_in'])) {
    header("location: login.php");
}

// if user is logged in then see the order summery
if (isset($_SESSION['logged_in'])) {
    $user_id = $_SESSION['u_id'];

    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $orders = $stmt->get_result();
}


if (isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
        unset($_SESSION['u_name']);
        unset($_SESSION['u_email']);
        header("location:login.php");
        exit;
    }
}

?>

<?php include "includes/profileHeader.php"; ?>


<body>
    <?php include 'includes/header.php'; ?>

    <main id="content" class="wrapper layout-page">

        <section class="container-xxl mt-15 pb-14 pb-lg-19">
            <div class="text-center">
                <h2 class="mb-8 pt-4">My Profile</h2>
                <a href="profile.php?logout=1">Logout</a>

            </div>
            <div class="">
                <div class="row ">

                    <div class="col-lg-3 pb-lg-0 pb-14 order-lg-last my-checkout-odrsumry">
                        <div class="card border-0 rounded-0 shadow my-checkout-odrsumry-inn">
                            <div class="card-header px-0 mx-10 bg-transparent py-8">
                                <h4 class="fs-4 mb-8">profile</h4>
                                <div class="d-flex w-100 mb-7">
                                    <div class="me-6">
                                        <i class="fa-regular fa-circle-user"></i>
                                    </div>
                                    <div class="d-flex flex-grow-1">
                                        <h6>
                                            <a href="usr-personl-dtl-edt.php"> Personal Information </a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="d-flex w-100 mb-7">
                                    <div class="me-6">
                                        <i class="fa-regular fa-address-book"></i>
                                    </div>
                                    <div class="d-flex flex-grow-1">
                                        <h6>
                                            <a href="usr-adres-bok-pg.php"> Address Book </a>
                                        </h6>
                                    </div>
                                </div>

                                <div class="d-flex w-100 mb-7">
                                    <div class="me-6">
                                        <i class="fa-regular fa-address-book"></i>
                                    </div>
                                    <div class="d-flex flex-grow-1">
                                        <h6>
                                            <a href="usr-odr-history.php"> Order History </a>
                                        </h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 order-lg-first px-xl-10 pe-lg-6">
                        <!-- ORDER SUMMERY -->
                        <section id="best_sellers_collection_best_sellers">
                            <div class="container-xxl ">

                                <div class="user-profile-overview">
                                    <div class="card mb-5 rounded-4 card-brand">
                                        <div class="card-header p-15" style="background-color: #656c71"></div>
                                        <div class="card-body p-7">
                                            <div class="row justify-content-end ">
                                                <div class="col-xl col-lg flex-grow-0 mb-xl-0 mb-7"
                                                    style="flex-basis: 150px; margin-left: 75%;">
                                                    <div
                                                        class="img-thumbnail shadow w-100 bg-body position-relative text-center mt-n20 py-3 px-4">
                                                        <?php if (isset($_SESSION['u_img'])) {
                                                            ?>
                                                            <img class="img-fluid loaded" src="uploads/<?php
                                                            echo $_SESSION['u_img'];
                                                            ?>" data-src="uploads/<?php
                                                            echo $_SESSION['u_img'];
                                                            ?>" alt="Logo Brand" width="180" height="180 "
                                                                loading="lazy" data-ll-status="loaded">
                                                            <?php
                                                        } ?>
                                                    </div>
                                                </div>
                                                <div class="col-xl col-lg">
                                                    <h3 class="fs-4 mb-0 text-end">
                                                        <span class="me-4">
                                                            <?php if (isset($_SESSION['u_name'])) {
                                                                echo $_SESSION['u_name'];
                                                            } ?>
                                                        </span>
                                                        <span> <a class="" href="usr-personl-dtl-edt.php"> <i
                                                                    class="fa-regular fa-pen-to-square"></i> </a>
                                                        </span>
                                                    </h3>

                                                </div>

                                            </div>
                                            <hr class="my-7">
                                            <div class="row justify-content-end">

                                                <?php
                                                $row = $orders->fetch_assoc();
                                                if (isset($_SESSION['u_id']) && !empty($row['user_address'])) { ?>
                                                    <div class="col-sm-6 col-lg-6 col-xl-6  text-end">
                                                        <h6 class="fs-18px mb-4">Address</h6>
                                                        <p class="mb-0">
                                                            Ciry:
                                                            <?= $row['user_city']; ?>
                                                            <br>
                                                            Address:
                                                            <?= $row['user_address']; ?>
                                                        </p>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="usr-acount-data-ro1">
                                    <h4 class="fs-4 ">Order Summary</h4>
                                    <p class="fs-15px mb-8">Track your open orders & view the summary of your past
                                        orders</p>
                                    <div class="row gy-11">
                                        <!-- Order Summery Items One start-->
                                        <?php while ($row = $orders->fetch_assoc()) { ?>

                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <div class="card">
                                                    <img src="assets/img/.png" class="card-img-top" alt="...">
                                                    <div class="card-body text-center">
                                                        <h4
                                                            class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                                            Enriched Duo
                                                        </h4>
                                                        <!-- <h6 class="card-text text-body fs-15px fw-500"> Delivered </h6> -->
                                                        <span
                                                            class="badge rounded-lg badge-soft-success border-0 text-capitalize fs-12">
                                                            <?php echo $row['o_status'] ?>
                                                        </span>
                                                        <p class="card-text"> Delivered on
                                                            <?php echo $row['o_date'] ?>
                                                        </p>
                                                        <a href="usr-odr-sumry-detl.php"
                                                            class="btn mybtn-styl-sm"><span>More
                                                                Detail</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <!-- Order Summery Items One End-->




                                        <!-- <div class="wishlist-update-btn-dv2 text-center">
                                                                                        <button type="submit" class="btn px-9 mybtn-styl-outline">
                                                                                            Countinue Shopping
                                                                                        </button>
                                                                                    </div> -->

                                    </div>
                                </div>



                                <div class="usr-acount-data-ro2">
                                    <h4 class="fs-4 mb-8">wishlist</h4>
                                    <!-- FETURE WISHLIST PRODUCTS -->
                                    <section id="best_sellers_collection_best_sellers">
                                        <div class=" ">
                                            <div class="row gy-11">

                                                <!-- Whishlist Items Start -->
                                                <div class="col-lg-3 col-sm-6 col-6">
                                                    <div class="card">
                                                        <img src="assets/img/products/pro2demo.png" class="card-img-top"
                                                            alt="...">
                                                        <div class="card-body text-center">

                                                            <h4
                                                                class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                                                Enriched Duo</h4>
                                                            <p class="card-text">
                                                                <span
                                                                    class="fs-13px fw-500 text-decoration-line-through pe-3">$39.00</span>
                                                                <span
                                                                    class="fs-15px fw-bold text-body-emphasis pe-3">$29.00</span>
                                                                <span
                                                                    class="badge rounded-lg badge-soft-success border-0 text-capitalize fs-12">In
                                                                    stock</span>

                                                            </p>
                                                            <div class="wishlist-option-btn-dv">
                                                                <a href="#" class=" mybtn-styl-sm"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="Add To Cart">
                                                                    <span><i
                                                                            class="fa-solid fa-cart-shopping"></i></span>
                                                                </a>
                                                                <a href="#" class=" mybtn-styl-sm"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="Add To Cart">
                                                                    <span><i class="fa-solid fa-trash-can"></i></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Whishlist Items End -->

                                                <div class="col-lg-3 col-sm-6 col-6">
                                                    <div class="card">
                                                        <img src="assets/img/products/pro2demo.png" class="card-img-top"
                                                            alt="...">
                                                        <div class="card-body text-center">

                                                            <h4
                                                                class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                                                Enriched Duo</h4>
                                                            <p class="card-text">
                                                                <span
                                                                    class="fs-13px fw-500 text-decoration-line-through pe-3">$39.00</span>
                                                                <span
                                                                    class="fs-15px fw-bold text-body-emphasis pe-3">$29.00</span>
                                                                <span
                                                                    class="badge rounded-lg badge-soft-success border-0 text-capitalize fs-12">In
                                                                    stock</span>

                                                            </p>
                                                            <div class="wishlist-option-btn-dv">
                                                                <a href="#" class=" mybtn-styl-sm"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="Add To Cart">
                                                                    <span><i
                                                                            class="fa-solid fa-cart-shopping"></i></span>
                                                                </a>
                                                                <a href="#" class=" mybtn-styl-sm"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="Add To Cart">
                                                                    <span><i class="fa-solid fa-trash-can"></i></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-sm-6 col-6">
                                                    <div class="card">
                                                        <img src="assets/img/products/pro2demo.png" class="card-img-top"
                                                            alt="...">
                                                        <div class="card-body text-center">

                                                            <h4
                                                                class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                                                Enriched Duo</h4>
                                                            <p class="card-text">
                                                                <span
                                                                    class="fs-13px fw-500 text-decoration-line-through pe-3">$39.00</span>
                                                                <span
                                                                    class="fs-15px fw-bold text-body-emphasis pe-3">$29.00</span>
                                                                <span
                                                                    class="badge rounded-lg badge-soft-success border-0 text-capitalize fs-12">In
                                                                    stock</span>

                                                            </p>
                                                            <div class="wishlist-option-btn-dv">
                                                                <a href="#" class=" mybtn-styl-sm"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="Add To Cart">
                                                                    <span><i
                                                                            class="fa-solid fa-cart-shopping"></i></span>
                                                                </a>
                                                                <a href="#" class=" mybtn-styl-sm"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="Add To Cart">
                                                                    <span><i class="fa-solid fa-trash-can"></i></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-sm-6 col-6">
                                                    <div class="card">
                                                        <img src="assets/img/products/pro2demo.png" class="card-img-top"
                                                            alt="...">
                                                        <div class="card-body text-center">

                                                            <h4
                                                                class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                                                Enriched Duo</h4>
                                                            <p class="card-text">
                                                                <span
                                                                    class="fs-13px fw-500 text-decoration-line-through pe-3">$39.00</span>
                                                                <span
                                                                    class="fs-15px fw-bold text-body-emphasis pe-3">$29.00</span>
                                                                <span
                                                                    class="badge rounded-lg badge-soft-success border-0 text-capitalize fs-12">In
                                                                    stock</span>

                                                            </p>
                                                            <div class="wishlist-option-btn-dv">
                                                                <a href="#" class=" mybtn-styl-sm"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="Add To Cart">
                                                                    <span><i
                                                                            class="fa-solid fa-cart-shopping"></i></span>
                                                                </a>
                                                                <a href="#" class=" mybtn-styl-sm"
                                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                                    data-bs-title="Add To Cart">
                                                                    <span><i class="fa-solid fa-trash-can"></i></span>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </section>
                                    <!-- FETURE WISHLIST PRODUCTS -->
                                </div>
                            </div>
                        </section>
                        <!-- ORDER SUMMERY -->
                    </div>

                </div>
            </div>
        </section>
    </main>
    <?php include 'includes/footer.php' ?>

</body>

</html>