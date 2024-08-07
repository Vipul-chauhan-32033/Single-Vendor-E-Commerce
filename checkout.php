<?php
session_start();

if (!empty($_SESSION['cart'])) {


} else {
    header("location:index.php");
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Checkout your all products and get items</title>
    <link rel="icon" href="assets/img/mylogo3.png" />

    <link rel="stylesheet" href="assets/css/forms.css" />



</head>

<body>

    <div class="container">
        <div class="form-box">
            <h1 id="title">Check Out</h1>
            <form action="server/place_order.php" name="checkout-form" id="checkout-form" method="post"
                enctype="multipart/form-data">
                <!-- error message  -->
                <p>
                    <?php if (isset($_GET['message'])) {
                        echo $_GET['message'];

                        ?>
                        <a href="login.php">Login</a>
                    <?php }
                    ?>
                </p>
                <div class="input-group" id="inputGroup">
                    <div class="input-field " id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="user_name" id="user_name" placeholder="Enter Your Name" value="<?php {
                            if (isset($_SESSION['u_name']))
                                echo $_SESSION['u_name'];
                        } ?>" required />
                    </div>
                    <div class="input-field " id="emailField">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="email" name="user_email" id="user_email" placeholder="Enter Email Address" value="<?php {
                            if (isset($_SESSION['u_email']))
                                echo $_SESSION['u_email'];
                        } ?>" required />
                    </div>
                    <div class="input-field " id="phoneField">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" name="user_phone" id="user_phone" placeholder="Enter Phone Number" value="<?php {
                            if (isset($_SESSION['u_phone']))
                                echo $_SESSION['u_phone'];
                        } ?>" required />
                    </div>
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-city"></i>
                        <input type="text" name="user_city" id="user_city" placeholder="Enter Your City" required />
                    </div>
                    <div class="input-field checkout-large-element" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <textarea name="user_address" id="user_address" cols="30" rows="4"
                            placeholder="Enter Your Address" required></textarea>

                    </div>

                    <p>Total Amount:
                        <?php echo $_SESSION['total'] ?>
                    </p>

                    <div class="btn-field place_order mt-2">

                        <button type="submit" id="place_order" name="place_order">
                            Place Order
                        </button>

                    </div>

                </div>
            </form>
        </div>
    </div>

</body>

</html>