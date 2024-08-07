<?php

session_start();

include("includes/connection.php");
include("includes/sql_crud_operation.php");

// check whether admin loggedin or not

if (!isset($_SESSION['admin_logged_in'])) {
    header("location: login.php");
    exit;
}

// Edit the products using get edit id

if (isset($_GET['edit_id'])) {

    $editid = $_GET['edit_id'];
    $edit_data = selectdatabyid("testimonial", $editid);
}


if (isset($_POST['add_testimonial'])) {
    $filename = $_FILES['img']['name'];
    $tempname = $_FILES['img']['tmp_name'];
    move_uploaded_file($tempname, 'uploads/' . $filename);

    $data = array(
        "t_img" => '"' . $filename . '"',
        "t_name" => '"' . $_POST['name'] . '"',
        "t_description" => '"' . $_POST['description'] . '"',
        "t_occupation" => '"' . $_POST['occupation'] . '"',
    );

    if (isset($_GET['edit_id'])) {
        update("testimonial", $data, $editid);
        header("location: all-testimonial.php");
        exit;
    }

    insert('testimonial', $data);
    header('location:all-testimonial.php');

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Testimonial</title>
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
                                <h4 class="card-title">Add Testimonial</h4><br>
                                <form class="forms-sample" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Upload Testimonial Image</label>
                                        <div class="input-group col-xs-12">
                                            <input type="file" name="img" id="img"
                                                class="form-control file-upload-info">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputName1">Name</label>
                                        <input type="text" class="form-control" name="name" id="exampleInputName1"
                                            placeholder="Name" value="<?php if (isset($_GET['edit_id'])) {
                                                echo $edit_data['t_name'];
                                            } ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea class="form-control" id="description" name="description" rows="4"><?php if (isset($_GET['edit_id'])) {
                                            echo $edit_data['t_description'];
                                        } ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="occupation">Occupation</label>
                                        <input type="text" class="form-control" id="occupation" name="occupation"
                                            placeholder="occupation" value="<?php if (isset($_GET['edit_id'])) {
                                                echo $edit_data['t_occupation'];
                                            } ?>">
                                    </div>

                                    <button type="submit" class="btn btn-gradient-primary me-2"
                                        name="add_testimonial">Submit</button>
                                    <button class="btn btn-light" type="reset">Clear</button>
                                </form>
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