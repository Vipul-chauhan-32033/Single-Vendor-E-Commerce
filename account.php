<?php

session_start();

include "server/connection.php";

if (!isset($_SESSION['logged_in'])) {
    header("location: login.php");
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


if (isset($_POST['change_pass'])) {
    $newpass = $_POST['newpass'];
    $c_newpass = $_POST['c_newpass'];
    $email = $_SESSION['email'];

    // if password not matching 
    if ($newpass !== $c_newpass) {
        header("location: account.php?error=password does not match");
    }
    // if password should be 8 character
    else if (strlen($newpass) < 8) {
        header("location: account.php?error=password legnth minimum 8 character");

    } // no error
    else {
        $stmt = $conn->prepare("UPDATE users SET password=? where email=?");
        $stmt->bind_param("ss", $newpass, $email);
        if ($stmt->execute()) {
            header("location: account.php?message=password update successfully");

        } else {
            header("location: account.php?error=could not update password");

        }

    }
}

if (isset($_SESSION['logged_in'])) {
    $user_id = $_SESSION['u_id'];


    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=?");

    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    $orders = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $_SESSION['u_name']; ?> Account
    </title>
    <?php include 'includes/headLinks.php' ?>

</head>

<body>
    <section class="my-5 pt-5">
        <div class="row container mx-auto">
            <div class="text-center mt-3 pt-3 col-lg-6 col-md-12 col-sm-12">
                <h3 class="font-weight-bolder">Account</h3>
                <hr class="mx-auto">
                <div class="register_success" style="color:green">
                    <?php if (isset($_GET['register_success'])) {
                        echo $_GET['register_success'];
                    } ?>
                </div>
                <div class="login_success" style="color:green">
                    <?php if (isset($_GET['login_success'])) {
                        echo $_GET['login_success'];
                    } ?>
                </div>
                <p>User:
                    <span>
                        <?php if (isset($_SESSION['u_name'])) {
                            echo $_SESSION['u_name'];
                        } ?>
                    </span>

                </p>
                <p>Email:
                    <span>
                        <?php if (isset($_SESSION['u_email'])) {
                            echo $_SESSION['u_email'];
                        } ?>
                    </span>

                </p>
                <p>
                    <a href="#yourOrder">Your Order</a>

                </p>
                <p>
                    <a href="account.php?logout=1">Logout</a>

                </p>
            </div>
            <div class="text-center mt-3 pt-3 col-lg-6 col-md-12 col-sm-12">
                <form action="account.php" method="POST" id="account-form">
                    <h3 class="font-weight-bolder">Change Password</h3>
                    <hr class="mx-auto">
                    <div class="error" style="color:red">
                        <?php if (isset($_GET['error'])) {
                            echo $_GET['error'];
                        } ?>

                    </div>
                    <div class="message" style="color:green">
                        <?php if (isset($_GET['message'])) {
                            echo $_GET['message'];
                        } ?>
                    </div>

                    <div class="form-group">
                        <label for="newpass">Password</label>
                        <input type="password" class="form-control" name="newpass" id="newpass"
                            placeholder="Current Password" required>

                    </div>
                    <div class="form-group">
                        <label for="c_newpass">New Password</label>
                        <input type="password" class="form-control" name="c_newpass" id="c_newpass"
                            placeholder="New Password" required>

                    </div>
                    <div class="form-group">
                        <input type="submit" style="background-color:coral" name="change_pass" class="btn"
                            id="change-pass-btn" value="Change Password">
                    </div>
                </form>
            </div>

        </div>
    </section>

    <!-- Your Order -->
    <section class="cart container my-2 py-2" name="cart">
        <div class="container my-5">
            <h2 class="font-weight-bolder">Your Order</h2>
            <hr />
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>order id</th>
                <th>order cost</th>
                <th>order status</th>
                <th>order date</th>
                <th>order details</th>

            </tr>
            <?php while ($row = $orders->fetch_assoc()) { ?>
                <tr>
                    <td>
                        <?php echo $row['o_id'] ?>
                    </td>
                    <td><span>$</span>
                        <?php echo $row['o_cost'] ?>
                    </td>
                    <td>
                        <?php echo $row['o_status'] ?>
                    </td>
                    <td>
                        <?php echo $row['o_date'] ?>
                    </td>
                    <td>
                        <form action="order_details.php" method="POST">
                            <input type="hidden" name="o_id" value="<?php echo $row['o_id'] ?>">
                            <input type="hidden" name="o_status" value="<?php echo $row['o_status'] ?>">
                            <input type="submit" class="btn" style="width:auto; background-color: coral;" name="o_detail"
                                id="  " value="Details">
                        </form>
                    </td>



                </tr>
            <?php } ?>
        </table>

    </section>



</body>

</html>