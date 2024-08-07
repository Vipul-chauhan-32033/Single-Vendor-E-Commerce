<?php
session_start();
include "includes/profileHeader.php"; ?>


<body>

    <!-- header after login -->
    <?php include 'includes/header.php'; ?>

    <!-- header after login -->

    <!-- WISHLIST PAGE CONTENT -->
    <main id="content" class="wrapper mt-16 layout-page">

        <section class="container-xxl pb-14 pb-lg-19">
            <div class="text-center mb-8">
                <!-- <h2 class="mb-8">My Account</h2> -->
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

                    <div class="col-lg-9 order-lg-first pe-xl-10 pe-lg-6">
                        <div class="card border-0 rounded-0 shadow ">
                            <div class="card-header px-0 mx-10 bg-transparent py-8">
                                <h4 class="fs-4 mb-8">Delivery Address</h4>
                                <div class="d-flex w-100 mb-7">
                                    <div class="me-6">
                                        <i class="fa-regular fa-circle-user"></i>
                                    </div>
                                    <div class="d-flex flex-grow-1">
                                        <h6>
                                            Raj Mishra
                                        </h6>
                                    </div>
                                </div>
                                <div class="d-flex w-100 mb-7">
                                    <div class="me-6">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="d-flex flex-grow-1">
                                        <address>
                                            535, R K World Tower,
                                            near Shital Park,
                                            150 Feet Ring Road,Rajkot-360007
                                        </address>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card border-0 rounded-0 shadow  myusr-odr-smry-det-ro">
                            <div class="card-header px-0 mx-10 bg-transparent py-8">
                                <!-- <h4 class="fs-4 mb-8">Delivery Address</h4> -->
                                <p class="fs-15px"><i class="fa-regular fa-calendar-days me-2"></i> sun, 8th jan</p>
                                <div class="d-flex w-100 mb-7">
                                    <div class="me-6">
                                        <div class="usr-odr-smry-pro-img-dv">
                                            <a href="#">
                                                <img src="assets/img/products/pro2demo.png"
                                                    data-src="assets/img/products/pro2demo.png"
                                                    alt="Flowers cotton dress" class="loaded" width="200" height="200"
                                                    loading="lazy" data-ll-status="loaded">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="myusr-odr-smry-det-col">
                                        <div class="myusr-odr-smry-det-col-ro">
                                            <h4
                                                class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-0">
                                                <a class="text-decoration-none text-reset" href="#">Patola Saree</a>
                                            </h4>
                                        </div>
                                        <div class="myusr-odr-smry-det-col-ro">
                                            <span class=" price text-body-emphasis fw-bold  mb-4 fs-6">
                                                <del class=" text-body fw-500 me-4 fs-13px">$40.00</del>
                                                <ins class="text-decoration-none">$30.00</ins>
                                            </span>
                                        </div>
                                        <div class="myusr-odr-smry-det-col-ro">
                                            <p class="fs-15px mt-4">
                                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam
                                                nesciunt molestias labore mollitia accusantium numquam aut corrupti
                                                quibusdam natus harum!
                                            </p>
                                        </div>

                                        <div class="myusr-odr-smry-det-col-ro">

                                        </div>

                                    </div>
                                </div>
                                <div class="d-flex w-100 mb-7">
                                    <div class="me-6">
                                        <div class="card-body p-0">
                                            <h5 class="card-title fs-6 mb-6">Recent activities</h5>
                                            <ul class="verti-timeline list-unstyled fs-13px mx-4">
                                                <li class="event-list d-flex align-items-center position-relative">
                                                    <div class="event-timeline-dot">
                                                        <i class="fa-solid fa-location-crosshairs"></i>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="me-6">
                                                            <h6 class="fs-13px mb-0"><span
                                                                    class="d-inline-block me-6 w-50px">Today</span>
                                                                <i class="fa-solid fa-angle-right"></i>
                                                            </h6>
                                                        </div>
                                                        <p class="mb-0 fs-13px">Lorem ipsum dolor sit amet consectetur
                                                        </p>
                                                    </div>
                                                </li>
                                                <li
                                                    class="event-list d-flex align-items-center position-relative active">
                                                    <div class="event-timeline-dot">
                                                        <i class="fa-solid fa-location-crosshairs"></i>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="me-6">
                                                            <h6 class="fs-13px mb-0"><span
                                                                    class="d-inline-block me-6 w-50px">17 May</span>
                                                                <i class="fa-solid fa-angle-right"></i>
                                                            </h6>
                                                        </div>
                                                        <p class="mb-0 fs-13px">Debitis nesciunt voluptatum dicta
                                                            reprehenderit</p>
                                                    </div>
                                                </li>
                                                <li class="event-list d-flex align-items-center position-relative">
                                                    <div class="event-timeline-dot">
                                                        <i class="fa-solid fa-location-crosshairs"></i>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="me-6">
                                                            <h6 class="fs-13px mb-0"><span
                                                                    class="d-inline-block me-6 w-50px">13 May</span>
                                                                <i class="fa-solid fa-angle-right"></i>
                                                            </h6>
                                                        </div>
                                                        <p class="mb-0 fs-13px">Accusamus voluptatibus voluptas.</p>
                                                    </div>
                                                </li>
                                                <li class="event-list d-flex align-items-center position-relative">
                                                    <div class="event-timeline-dot">
                                                        <i class="fa-solid fa-location-crosshairs"></i>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="me-6">
                                                            <h6 class="fs-13px mb-0"><span
                                                                    class="d-inline-block me-6 w-50px">05 April</span>
                                                                <i class="fa-solid fa-angle-right"></i>
                                                            </h6>
                                                        </div>
                                                        <p class="mb-0 fs-13px">At vero eos et accusamus et iusto odio
                                                            dignissi</p>
                                                    </div>
                                                </li>
                                                <li class="event-list d-flex align-items-center position-relative">
                                                    <div class="event-timeline-dot">
                                                        <i class="fa-solid fa-location-crosshairs"></i>
                                                    </div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <div class="me-6">
                                                            <h6 class="fs-13px mb-0"><span
                                                                    class="d-inline-block me-6 w-50px">26 Mar</span>
                                                                <i class="fa-solid fa-angle-right"></i>
                                                            </h6>
                                                        </div>
                                                        <p class="mb-0 fs-13px">Responded to need “Volunteer Activities
                                                        </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="myusr-odr-smry-det-col">

                                    </div>

                                </div>



                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>


    </main>
    <!-- WISHLIST PAGE CONTENT -->

    <?php include 'includes/footer.php' ?>

</body>



</html>