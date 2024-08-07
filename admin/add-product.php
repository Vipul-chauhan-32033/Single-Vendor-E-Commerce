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
  <title>Add Products</title>
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
                <h4 class="card-title">Add Product</h4><br>
                <form class="forms-sample" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="gender">Select Product Category</label>
                    <select class="form-control" id="gender" name="gender">
                      <option value="men">men</option>
                      <option value="women">women</option>
                      <option value="kid">kid</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Upload Product Image</label>
                    <div class="input-group col-xs-12">
                      <input type="file" name="img" id="img" class="form-control file-upload-info">

                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" name="name" id="exampleInputName1" placeholder="Name" value="<?php if (isset($_GET['edit_id'])) {
                      echo $edit_data['p_name'];
                    } ?>">
                  </div>
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="4"><?php if (isset($_GET['edit_id'])) {
                      echo $edit_data['p_description'];
                    } ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="<?php if (isset($_GET['edit_id'])) {
                      echo $edit_data['p_price'];
                    } ?>">
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status">
                      <option value="1">Active</option>
                      <option value="0">InActive</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-gradient-primary me-2" name="add_product">Submit</button>
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