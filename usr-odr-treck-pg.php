<?php
session_start();
include "includes/profileHeader.php"; ?>


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
                                    <div class="container">
                                        <article class="card">
                                            <header class="card-header"> My Orders </header>
                                            <div class="card-body">
                                                <h6>Order ID: OD45345345435</h6>
                                                <article class="card">
                                                    <div class="card-body row gy-6">
                                                        <div class="col-sm-6"> <strong>Estimated Delivery time:</strong>
                                                            <br>29 nov 2019
                                                        </div>
                                                        <div class="col-sm-6"> <strong>Shipping BY:</strong> <br>
                                                            BLUEDART, | <i class="fa fa-phone"></i> +1598675986 </div>
                                                        <div class="col-sm-6"> <strong>Status:</strong> <br> Picked by
                                                            the courier </div>
                                                        <!-- <div class="col-sm-6"> <strong>Tracking #:</strong> <br> BD045903594059 </div> -->
                                                    </div>
                                                </article>
                                                <div class="track">
                                                    <div class="step active"> <span class="icon"> <i
                                                                class="fa fa-check"></i> </span> <span
                                                            class="text">Order confirmed</span> </div>
                                                    <div class="step active"> <span class="icon"> <i
                                                                class="fa fa-user"></i> </span> <span class="text">
                                                            Picked by courier</span> </div>
                                                    <div class="step"> <span class="icon"> <i class="fa fa-truck"></i>
                                                        </span> <span class="text"> On the way </span> </div>
                                                    <div class="step"> <span class="icon"> <i class="fa fa-box"></i>
                                                        </span> <span class="text">Ready for pickup</span> </div>
                                                </div>
                                                <hr>

                                            </div>
                                        </article>
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

    <!-- footer section -->

    <?php include 'includes/footer.php' ?>

</body>



</html>