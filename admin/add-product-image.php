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
  $edit_data = selectdatabyid("products", $editid);
}


if (isset($_POST['add_product'])) {
  $filename = $_FILES['img']['name'];
  $tempname = $_FILES['img']['tmp_name'];
  move_uploaded_file($tempname, 'uploads/' . $filename);

  $data = array(
    "p_img" => '"' . $filename . '"',
    "p_category" => '"' . $_POST['gender'] . '"',
    "p_name" => '"' . $_POST['name'] . '"',
    "p_description" => '"' . $_POST['description'] . '"',
    "p_price" => '"' . $_POST['price'] . '"',
    "p_status" => '"' . $_POST['status'] . '"'

  );

  if (isset($_GET['edit_id'])) {
    update("products", $data, $editid);
    header("location: all-products.php");
    exit;
  }

  insert('products', $data);
  header('location:all-products.php');

}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Add Products Category</title>
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
                <h4 class="card-title">Add Product Category</h4><br>
                <form class="forms-sample">
                  <div class="form-group">
                    <label for="exampleInputName1">Catagory Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Catagory Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectGender">Status</label>
                    <select class="form-control" id="exampleSelectGender">
                      <option>Active</option>
                      <option>InActive</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
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