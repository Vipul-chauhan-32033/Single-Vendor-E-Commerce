<?php
session_start();
include('includes/connection.php');
include('includes/sql_crud_operation.php');
// if user is not loggin then return to login page
if (!isset($_SESSION['admin_logged_in'])) {
  header("location: login.php");
}
$contact = fetchalldata("contact");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ENQUIRY VG Smart Bazzar</title>
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
                <h4 class="card-title">All Enquiry</h4>
                <div class="card">
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Sr.No</th>
                          <th>Date</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Message</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <?php foreach ($contact as $key => $value) {
                        // if today's date compare to smaller then print
                        if ($value['date'] < date('yy-mm-dd hh:mm:ss')) {

                          ?>
                          <tbody>
                            <tr>
                              <td>
                                <?php echo $key + 1; ?>
                              </td>
                              <td style="text-wrap: pretty;">
                                <?php echo $value['date']; ?>
                              </td>
                              <td>
                                <?php echo $value['name']; ?>
                              </td>
                              <td>
                                <?php echo $value['email']; ?>
                              </td>
                              <td>
                                <?php echo $value['phone']; ?>
                              </td>
                              <td style="text-wrap: pretty;">
                                <?php echo $value['description']; ?>
                              </td>
                              <td>
                                <?php if (isset($value['date'])) { ?>
                                  <label class="badge badge-success">New</label>
                                <?php } else { ?>
                                  <label class="badge badge-danger">Old</label>
                                <?php } ?>
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