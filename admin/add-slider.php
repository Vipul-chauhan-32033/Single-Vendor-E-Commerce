<?php
session_start();
include "includes/connection.php";
include "includes/sql_crud_operation.php";

// check whether admin loggedin or not

if (!isset($_SESSION['admin_logged_in'])) {
  header("location: login.php");
  exit;
}

// Edit the products using get edit id

if (isset($_GET['edit_id'])) {

  $editid = $_GET['edit_id'];
  $edit_data = selectdatabyid("slider", $editid);
}


if (isset($_POST['add_slider'])) {
  $filename = $_FILES['img']['name'];
  $tempname = $_FILES['img']['tmp_name'];
  move_uploaded_file($tempname, 'uploads/banner/' . $filename);

  $data = array(
    "s_img" => '"' . $filename . '"',
    "s_name" => '"' . $_POST['heading'] . '"',
    "s_date" => '"' . $_POST['date'] . '"',
    "s_status" => '"' . $_POST['status'] . '"'

  );

  if (isset($_GET['edit_id'])) {
    update("slider", $data, $editid);
    header("location: all-slider.php");
    exit;
  }

  insert('slider', $data);
  header('location:all-slider.php');

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Slider</title>
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
                <h4 class="card-title">Add Slider</h4><br>
                <form class="forms-sample" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Upload Image</label>
                    <div class="input-group col-xs-12">
                      <input type="file" name="img" class="form-control file-upload-info" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="heading">Heading</label>
                    <input type="text" class="form-control" name="heading" id="heading" placeholder="Heading" value="<?php if (isset($_GET['edit_id'])) {
                      echo $edit_data['s_name'];
                    } ?>">
                  </div>
                  <div class=" form-group">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" name="date" required value="<?php if (isset($_GET['edit_id'])) {
                      echo $edit_data['s_date'];
                    } ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectGender">Status</label>
                    <select class="form-control" id="exampleSelectGender" name="status" required>
                      <option value="1">Active</option>
                      <option value="0">InActive</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2" name="add_slider">Submit</button>
                  <button class="btn btn-light">Clear</button>
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