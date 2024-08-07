<?php
include "server/connection.php";
session_start();

/**
 * oreder NOT PAID
 * order SHIPPED
 * order DELIVERD
 */

if (isset($_POST['o_detail']) && isset($_POST['o_id'])) {
    $order_id = $_POST['o_id'];
    $order_status = $_POST['o_status'];

    $stmt = $conn->prepare("SELECT * FROM order_item WHERE o_id=?");

    $stmt->bind_param("i", $order_id);
    $stmt->execute();

    $order_details = $stmt->get_result();
} else {
    header("location: account.php");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Order Detail Page
    </title>
    <?php include 'includes/headLinks.php' ?>

</head>

<body>


    <section class="cart container my-2 py-2" name="cart">
        <div class="container my-5">
            <h2 class="font-weight-bolder">Your Order</h2>
            <hr />
        </div>
        <table class="mt-5 pt-5">
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>

            </tr>
            <?php while ($row = $order_details->fetch_assoc()) { ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="assets/img/men/<?php echo $row['p_img']; ?>" alt="">

                        </div>
                    </td>
                    <td>
                        <?php echo $row['p_name']; ?>
                    </td>
                    <td><span>$</span>
                        <?php echo $row['p_price']; ?>
                    </td>
                    <td>
                        <?php echo $row['p_quantity']; ?>
                    </td>




                </tr>
            <?php } ?>
        </table>

        <?php if ($order_status == "on_hold") { ?>
            <form action="#" style="float:right; background-color:green;">
                <input type="submit" name="pay_now" id="    " value="Pay Now" class="" style="background-color:green;">
            </form>
        <?php } ?>

    </section>


</body>

</html>