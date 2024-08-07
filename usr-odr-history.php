<?php
session_start();

include "server/connection.php";

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
?>
<?php include "includes/profileHeader.php"; ?>


<body>

    <!-- header after login -->
    <?php include 'includes/header.php'; ?>

    <!-- header after login -->

    <!-- WISHLIST PAGE CONTENT -->
    <main id="content" class="wrapper mt-16 layout-page">

        <section class="container-xxl pb-14 pb-lg-19 mt-8">
            <!-- <div class="text-center">
                <h2 class="mb-8">My Account</h2>
            </div> -->
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

                                <div class="d-flex w-100 mb-7">
                                    <div class="me-6">
                                        <i class="fa-regular fa-address-book"></i>
                                    </div>
                                    <div class="d-flex flex-grow-1">
                                        <h6>
                                            <a href="usr-odr-treck-pg.php"> Treck Your Order </a>
                                        </h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-9 order-lg-first pe-xl-10 pe-lg-6">
                        <!-- ORDER SUMMERY -->
                        <section id="best_sellers_collection_best_sellers">
                            <div class="container-xxl ">

                                <div class="usr-acount-data-ro1">
                                    <h4 class="fs-4 ">Order Summary</h4>
                                    <p class="fs-15px mb-8">Track your open orders & view the summary of your past
                                        orders</p>
                                    <div class="row gy-11">
                                        <?php while ($row = $orders->fetch_assoc()) { ?>

                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <div class="card">
                                                    <img src="assets/img/products/pro2demo.png" class="card-img-top"
                                                        alt="...">
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
                                                        <p class="card-text">
                                                            <?php echo $row['o_date'] ?>
                                                        </p>
                                                        <a href="usr-odr-sumry-detl.php"
                                                            class="btn mybtn-styl-sm"><span>More Detail</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>



                                        <!-- <div class="wishlist-update-btn-dv2 text-center">
                                                                                    <button type="submit" class="btn px-9 mybtn-styl-outline">
                                                                                        Countinue Shopping
                                                                                    </button>
                                                                                </div> -->

                                    </div>
                                </div>

                            </div>
                        </section>
                        <!-- ORDER SUMMERY -->
                    </div>

                </div>
            </div>
        </section>


    </main>
    <!-- WISHLIST PAGE CONTENT -->

    <?php include 'includes/footer.php' ?>

</body>



</html>