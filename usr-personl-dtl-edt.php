<?php
session_start();
include "server/connection.php";
if (!isset($_SESSION['logged_in'])) {
    header("location: login.php");
}
if (isset($_SESSION['logged_in'])) {
    $user_id = $_SESSION['u_id'];

    if (isset($_POST['update_info'])) {

        if ($_FILES['u_img']['name'] != "") {
            $filename = $_FILES['u_img']['name'];
            $tempname = $_FILES['u_img']['tmp_name'];
            move_uploaded_file($tempname, 'uploads/' . $filename);
        } else {
            $filename = $_POST['oldimg'];
        }


        $first_name = $_POST['first-name'];
        $last_name = $_POST['last-name'];
        $full_name = $first_name . " " . $last_name;
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $img = $filename;
        $address = $_POST['address'];

        // set the session address  
        $_SESSION['user_address'] = $address;
        $stmt = $conn->prepare("UPDATE users SET name=?, email=?, phone=?, img=?, address=? WHERE user_id=? ");
        $stmt->bind_param('ssissi', $full_name, $email, $phone, $img, $address, $user_id);


        if ($stmt->execute()) {
            echo "<script>alert('Your Information Update')</script>";
        }
    }

    // second method not working 
    // if (isset($_POST['update_info'])) {
    //     if (!empty($_FILES['u_img']['name'])) {

    //         $filename = $_FILES['u_img']['name'];
    //         $tempname = $_FILES['u_img']['tmp_name'];
    //         move_uploaded_file($tempname, "uploads/" . $filename);
    //     } else {
    //         $filename = $_POST['oldimg'];
    //     }
    //     $data = array(

    //         "name" => $_POST['first-name'] . " " . $_POST['last-name'],
    //         "email" => $_POST['email'],
    //         "phone" => $_POST['phone'],
    //         "img" => $filename,
    //         "user_address" => $_POST['address']
    //     );

    //     // set the session address
    //     $_SESSION['user_address'] = $_POST['address'];

    //     $stmt = $conn->prepare("UPDATE users SET name=?, email=?, phone=?, img=? WHERE user_id=?");
    //     $stmt->bind_param('ssisi', $data['name'], $data['email'], $data['phone'], $data['img'], $user_id);
    //     $stmt = $conn->prepare("UPDATE orders SET user_address=? WHERE user_id=?");
    //     $stmt->bind_param('ss', $data['user_address'], $user_id);

    //     if ($stmt->execute()) {
    //         echo "<script>alert('Your Information Update')</script>";
    //     }
    // }


}



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
                        <!-- ORDER SUMMERY -->
                        <section id="best_sellers_collection_best_sellers">
                            <div class="container-xxl ">

                                <div class="card mb-4 rounded-4 p-7">
                                    <div class="card-body pt-7 pb-0 px-0">
                                        <div class="row mx-n8">
                                            <div class="col-lg-12 px-8">
                                                <section class="p-xl-8">
                                                    <form class="form-border-1" method="post"
                                                        enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-lg-8">
                                                                <div class="row gx-9">
                                                                    <div class="col-6 mb-6">
                                                                        <label
                                                                            class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                            for="first-name">First name</label>
                                                                        <input class="form-control" type="text"
                                                                            placeholder="First Name" id="first-name"
                                                                            name="first-name">
                                                                    </div>
                                                                    <div class="col-6 mb-6">
                                                                        <label
                                                                            class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                            for="last-name">Last name</label>
                                                                        <input class="form-control" type="text"
                                                                            placeholder="Last Name" id="last-name"
                                                                            name="last-name">
                                                                    </div>
                                                                    <div class="col-lg-6 mb-6">
                                                                        <label
                                                                            class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                            for="email">Email</label>
                                                                        <input class="form-control" type="email"
                                                                            placeholder="example@mail.com" id="email"
                                                                            name="email">
                                                                    </div>
                                                                    <div class="col-lg-6 mb-6">
                                                                        <label
                                                                            class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                            for="phone">Phone</label>
                                                                        <input class="form-control" type="tel"
                                                                            placeholder="+1234567890" id="phone"
                                                                            name="phone">
                                                                    </div>
                                                                    <div class="col-lg-12 mb-6">
                                                                        <label
                                                                            class="mb-5 fs-13px ls-1 fw-semibold text-uppercase"
                                                                            for="address">Address</label>
                                                                        <input class="form-control" type="text"
                                                                            placeholder="Address" id="address"
                                                                            name="address">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <aside class="col-lg-4">
                                                                <div class="text-lg-center">
                                                                    <div class="mx-auto">
                                                                        <?php if (isset($_SESSION['u_img'])) {
                                                                            ?>
                                                                            <img class="mb-9 rounded-pill loaded" src="uploads/<?php echo $_SESSION['u_img'];
                                                                            ?>
                                                                            " data-src="uploads/<?php echo $_SESSION['u_img'];
                                                                            ?>" alt="User Photo" height="196"
                                                                                width="196" loading="lazy"
                                                                                data-ll-status="loaded">
                                                                        <?php }
                                                                        ?>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="">
                                                                            <input class="form-control form-control-sm"
                                                                                id="formFileSm" name="u_img"
                                                                                type="file">
                                                                            <input type="hidden" name="oldimg" value="<?php
                                                                            if (isset($_SESSION['u_img'])) {
                                                                                echo $_SESSION['u_img'];
                                                                            } ?>">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </aside>
                                                        </div>
                                                        <br>
                                                        <button class="btn mybtn-styl2" type="submit"
                                                            name="update_info"><span>Save
                                                                changes</span></button>
                                                    </form>
                                                    <!-- <hr class="my-8"> -->

                                                </section>
                                            </div>
                                        </div>
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