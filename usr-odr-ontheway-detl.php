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
                                            <div class="return-camcle-btn-ro">

                                                <a href="usr-odr-ontheway-detl.php" class="btn mybtn-styl-sm"
                                                    data-bs-toggle="modal" data-bs-target="#returnrequestmodel">
                                                    <span>Return request</span>
                                                </a>
                                                <a href="usr-odr-ontheway-detl.php" class="btn mybtn-styl-sm"
                                                    data-bs-toggle="modal" data-bs-target="#cancellationmodel">
                                                    <span>Cancellation request</span>
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="order-treck-view-wrp">
                                    <div class="usr-acount-data-ro1">
                                        <div class="">
                                            <article class="card">
                                                <!-- <header class="card-header"> My Orders </header> -->
                                                <div class="card-body py-0">
                                                    <!-- <h6>Order ID: OD45345345435</h6> -->
                                                    <article class="card">
                                                        <div class="card-body row gy-6">
                                                            <div class="col-sm-6"> <strong>Estimated Delivery
                                                                    time:</strong> <br>29 nov 2019 </div>
                                                            <div class="col-sm-6"> <strong>Shipping BY:</strong> <br>
                                                                BLUEDART, | <i class="fa fa-phone"></i> +1598675986
                                                            </div>
                                                            <div class="col-sm-6"> <strong>Status:</strong> <br> Picked
                                                                by the courier </div>
                                                            <div class="col-sm-6"> <strong>Order ID:</strong> <br>
                                                                OD45345345435 </div>
                                                        </div>
                                                    </article>
                                                    <div class="track">
                                                        <div class="step active"> <span class="icon"> <i
                                                                    class="fa fa-check"></i> </span> <span
                                                                class="text">Order
                                                                confirmed</span> <span>
                                                                <p class="mb-1">17 May</p>
                                                            </span> </div>
                                                        <div class="step active"> <span class="icon"> <i
                                                                    class="fa fa-user"></i> </span> <span class="text">
                                                                Picked by
                                                                courier</span> <span>
                                                                <p class="mb-1">17 May</p>
                                                            </span> </div>
                                                        <div class="step"> <span class="icon"> <i
                                                                    class="fa fa-truck"></i> </span> <span class="text">
                                                                On the way </span>
                                                            <span>
                                                                <p class="mb-1">17 May</p>
                                                            </span>
                                                        </div>
                                                        <div class="step"> <span class="icon"> <i class="fa fa-box"></i>
                                                            </span> <span class="text">Ready for pickup</span>
                                                            <span>
                                                                <p class="mb-1">17 May</p>
                                                            </span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </article>
                                        </div>
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

    <!-- footer section -->

    <?php include 'includes/footer.php' ?>

</body>

<!-- MULTIPAL FILE UPLOAD -->
<script>
    // ----------multiplefile-upload---------
    jQuery(document).ready(function () {
        ImgUpload();
    });

    function ImgUpload() {
        var imgWrap = "";
        var imgArray = [];

        $('.upload__inputfile').each(function () {
            $(this).on('change', function (e) {
                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                var maxLength = $(this).attr('data-max_length');

                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function (f, index) {

                    if (!f.type.match('image.*')) {
                        return;
                    }

                    if (imgArray.length > maxLength) {
                        return false
                    } else {
                        var len = 0;
                        for (var i = 0; i < imgArray.length; i++) {
                            if (imgArray[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len > maxLength) {
                            return false;
                        } else {
                            imgArray.push(f);

                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                imgWrap.append(html);
                                iterator++;
                            }
                            reader.readAsDataURL(f);
                        }
                    }
                });
            });
        });

        $('body').on('click', ".upload__img-close", function (e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i].name === file) {
                    imgArray.splice(i, 1);
                    break;
                }
            }
            $(this).parent().parent().remove();
        });
    }
</script>
<!-- MULTIPAL FILE UPLOAD -->



</html>