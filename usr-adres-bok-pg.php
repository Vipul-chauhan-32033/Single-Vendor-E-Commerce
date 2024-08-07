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

    if (isset($_POST['add_address'])) {

        $street_address = $_POST['street_address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];
        $address = $street_address . ", " . $city . ", " . $state . "-" . $zip;

        $stmt1 = $conn->prepare("UPDATE orders SET user_address=?, user_city=? WHERE user_id=?");
        $stmt1->bind_param('ssi', $address, $state, $user_id);
        if ($stmt1->execute()) {
            echo "<script>alert('Your Address Updated')</script>";

        }

    }
}

?>
<?php include "includes/profileHeader.php"; ?>

<body>

    <!-- header after login -->
    <?php include 'includes/header.php'; ?>

    <!-- header after login -->

    <!-- WISHLIST PAGE CONTENT -->
    <main id="content" class="wrapper mt-16 layout-page">

        <section class="container-xxl  pb-14 pb-lg-19">
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
                                <h4 class="fs-4 mb-8">Default Address</h4>

                                <div class="d-flex w-100 mb-7">
                                    <div class="me-6">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <?php
                                    $row = $orders->fetch_assoc();
                                    if (isset($_SESSION['u_id']) && !empty($row['user_address'])) { ?>
                                        <div class="d-flex flex-grow-1">
                                            <address>
                                                <?= $row['user_address']; ?>
                                            </address>
                                        </div>
                                    <?php } ?>

                                    <div class="ms-6">
                                        <span class="c-green fs-20px"><i class="fa-regular fa-circle-check"></i></span>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card border-0 rounded-0 shadow  myusr-odr-smry-det-ro">
                            <div class="card-header px-0 mx-10 bg-transparent py-8">
                                <h4 class="fs-4 mb-8">Add Address</h4>
                                <form class="form-border-1" method="post">

                                    <div class="col-lg-12 order-lg-first ">
                                        <div class="checkout">


                                            <div class="mb-7">
                                                <label
                                                    class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Country</label>
                                                <div class="dropdown bg-body-secondary rounded">
                                                    <a href="#"
                                                        class="form-select dropdown-toggle d-flex justify-content-between align-items-center text-decoration-none text-secondary p-5 position-relative d-block"
                                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        India
                                                    </a>
                                                    <div class="dropdown-menu w-100 px-0 py-4">
                                                        <a class="dropdown-item px-6 py-4" href="#">India</a>
                                                        <a class="dropdown-item px-6 py-4" href="#">San Marino</a>
                                                        <a class="dropdown-item px-6 py-4" href="#">Tunisia</a>
                                                        <a class="dropdown-item px-6 py-4" href="#">Micronesia</a>
                                                        <a class="dropdown-item px-6 py-4" href="#">Solomon Islands</a>
                                                        <a class="dropdown-item px-6 py-4" href="#">Macedonia</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-7">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <!-- <label class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">For</label> -->
                                                        <label
                                                            class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">
                                                            Selet A Place </label>
                                                        <div class="dropdown bg-body-secondary rounded">
                                                            <select name="inputMonth" id="inputMonth"
                                                                class="form-select px-6 border-0">
                                                                <option selected="">
                                                                    Home
                                                                </option>
                                                                <option>
                                                                    Work
                                                                </option>
                                                                <option>
                                                                    Othere
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8 mb-md-0 mb-7">
                                                        <label for="street-address"
                                                            class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">Street
                                                            Address</label>
                                                        <input type="text" class="form-control" id="street_address"
                                                            name="street_address" required="">
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="mb-7">
                                                <div class="row">
                                                    <div class="col-md-4 mb-md-0 mb-7">
                                                        <label for="city"
                                                            class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">City</label>
                                                        <input type="text" class="form-control" id="city" name="city"
                                                            required="">
                                                    </div>
                                                    <div class="col-md-4 mb-md-0 mb-7">
                                                        <label for="state"
                                                            class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">State</label>
                                                        <input type="text" class="form-control" id="state" name="state"
                                                            required="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="zip"
                                                            class="mb-5 fs-13px letter-spacing-01 fw-semibold text-uppercase">zip
                                                            code</label>
                                                        <input type="text" class="form-control" id="zip" name="zip"
                                                            required="">
                                                    </div>
                                                </div>
                                            </div>





                                        </div>
                                        <div class="checkout mb-7">
                                            <button type="submit" class="btn mybtn-styl2 px-11 mt-md-7 mt-4"
                                                name="add_address"> <span>Add
                                                    Address</span> </button>
                                        </div>
                                    </div>
                                </form>
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