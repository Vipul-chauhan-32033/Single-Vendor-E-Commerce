<?php
session_start();

if (!empty($_SESSION['cart']) && isset($_POST['checkout'])) {

} else {
    // header("location:index.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Payment Pages </title>

    <!-- <link rel="stylesheet" href="assets/css/forms.css" /> -->

    <style>
        .container {
            text-align: center;
        }

        input[type="submit"] {
            border: 1px solid green;
            background: #9fd99f;
            padding: 6px 16px;
            border-radius: 8px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="form-box">
            <h1 id="title">Check Out</h1>
            <form action="" name="checkout-form" id="checkout-form" method="post" enctype="multipart/form-data">

                <div class="container">
                    <!-- <?php echo $_SESSION['total']; ?> -->
                    <p>
                        <?php if (isset($_GET['order_status'])) {
                            echo $_GET['order_status'];
                        } ?>

                    </p>
                    <p>Total Amount : $
                        <?php if (isset($_SESSION['total'])) {
                            echo $_SESSION['total'];
                        } ?>
                    </p>
                    <?php if (isset($_SESSION['total']) && isset($_SESSION['total']) != 0) { ?>
                        <input type="submit" name="pay_now" id="pay_now" value="Pay Now" class="btn">
                    <?php } else { ?>
                        <p>You don't have an order</p>
                    <?php } ?>
                    <?php if (isset($_GET['order_status']) && isset($_GET['total']) == "on_hold") { ?>
                        <input type="submit" name="pay_now" id="pay_now" value="Pay Now" class="btn">
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>

</body>

</html>