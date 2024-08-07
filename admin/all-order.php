<?php
session_start();
include('includes/connection.php');
include('includes/sql_crud_operation.php');
// if user is not loggin then return to login page
if (!isset($_SESSION['admin_logged_in'])) {
    header("location: login.php");
}
$order = fetchalldata("order_item");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Orders VG Smart Bazzar</title>
    <?php include_once('includes/css.php'); ?>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include_once('includes/header.php'); ?>

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <?php include_once("includes/sidebar.php"); ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Orders</h4>
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Order id</th>
                                                    <th>Date</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Product</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <?php foreach ($order as $key => $value) {
                                                // if today's date compare to smaller then print
                                                if ($value['o_date'] < date('yy-mm-dd hh:mm:ss')) {

                                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <?= $value['o_id']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['o_date']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['p_price']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $value['p_quantity']; ?>
                                                            </td>

                                                            <td>
                                                                <img src="uploads/<?php echo $value['p_img']; ?>" alt="">
                                                                <?php echo $value['p_name']; ?>
                                                            </td>
                                                            <td>
                                                                <label class="badge badge-success">Recived</label>
                                                            <?php } else { ?>
                                                                <label class="badge badge-danger">Pending</label>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                <?php }
                                            } ?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.php -->
                <?php include_once('includes/footer.php') ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php include_once('includes/script.php') ?>
</body>

</html>