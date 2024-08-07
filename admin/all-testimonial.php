<?php

session_start();

include("includes/connection.php");
include("includes/sql_crud_operation.php");

// check whether admin loggedin or not

if (!isset($_SESSION['admin_logged_in'])) {
    header("location: login.php");
    exit;
}


// Delete the product in the table and database
if (isset($_GET['delete-id'])) {
    deletedata("testimonial", $_GET["delete-id"]);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>All Testimonial</title>
    <?php include_once('includes/css.php'); ?>
    <style>
        th {
            font-weight: 700 !important;
        }
    </style>
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
                                <h4 class="card-title">All Testimonial</h4>
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Image</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Occupation</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $product = fetchalldata("testimonial");

                                                foreach ($product as $key => $value) {
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            <?= $value['id'] ?>
                                                        </td>
                                                        <td>
                                                            <img src="uploads/<?= $value['t_img'] ?>"
                                                                style="height: 80px; border-radius: 0; width: auto;">
                                                        </td>
                                                        <td>
                                                            <?= $value['t_name'] ?>
                                                        </td>

                                                        <td>
                                                            <?= $value['t_description'] ?>
                                                        </td>
                                                        <td>
                                                            <?= $value['t_occupation'] ?>
                                                        </td>
                                                        <td>
                                                            <div class="d-flex ">
                                                                <a href="add-testimonial.php?edit_id=<?= $value['id'] ?>">
                                                                    <span
                                                                        class="mdi mdi-pencil-box-outline actionBtn "></span></a>
                                                                <a href="all-testimonial.php?delete-id=<?= $value['id'] ?>"
                                                                    onclick="return confirm('Do You Want To Delete This Product!')">
                                                                    <span
                                                                        class="mdi mdi-delete actionBtn link-danger"></span></a>

                                                                <?php ?>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                <?php } ?>
                                            </tbody>
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