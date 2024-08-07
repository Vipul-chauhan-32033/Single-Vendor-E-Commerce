<?php

include('includes/connection.php');
include('includes/sql_crud_operation.php');
// if user is not loggin then return to login page
if (!isset($_SESSION['admin_logged_in'])) {
  header("location: login.php");
}
$sitesettingdata = selectdatabyid('sitesettings', '1');

if (isset($_POST['submit'])) {
  if ($_FILES['logo']['name'] != " ") {
    $filename = $_FILES['logo']['name'];
    $tempname = $_FILES['logo']['tmp_name'];
    move_uploaded_file($tempname, 'uploads/' . $filename);
  } else {
    $filename = $_POST['oldlogo'];
  }

  if ($_FILES['favicon']['name'] != " ") {
    $filenamev = $_FILES['favicon']['name'];
    $tempnamev = $_FILES['favicon']['tmp_name'];
    move_uploaded_file($tempnamev, 'uploads/' . $filenamev);
  } else {
    $filenamev = $_POST['oldfavicon'];
  }

  $data = array(
    "email" => '"' . $_POST['email'] . '"',
    "phone" => '"' . $_POST['phone'] . '"',
    "address" => '"' . $_POST['address'] . '"',
    "copyright" => '"' . $_POST['copyright'] . '"',
    "logo" => '"' . $filename . '"',
    "favicon" => '"' . $filenamev . '"',
  );

  update('sitesettings', $data, '1');

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Site Settings</title>
  <?php include_once('includes/css.php'); ?>
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.php -->
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
                <h4 class="card-title">Site Settings</h4><br>

                <form class="forms-sample" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="exampleInputName1">Email</label>
                    <input type="text" class="form-control" id="exampleInputName1" name="email" placeholder="Email"
                      value="<?php echo $sitesettingdata['email']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="phone">Primary Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Primary Number"
                      value="<?php echo $sitesettingdata['phone']; ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleTextarea1">Address</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="4"
                      name="address"><?php echo $sitesettingdata['address']; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="copyright">Copy Right</label>
                    <textarea class="form-control" id="copyright" rows="2"
                      name="copyright"><?php echo $sitesettingdata['copyright']; ?></textarea>
                  </div>
                  <div class="form-group">

                    <img src="uploads/<?php echo $sitesettingdata['logo']; ?>" style="height: 100px;">

                    <input type="hidden" name="oldlogo" value="<?php echo $sitesettingdata['logo']; ?>">

                    <p><label>Logo Upload</label></p>
                    <input type="file" name="logo">

                    <div class="form-group">

                      <img src="uploads/<?php echo $sitesettingdata['favicon']; ?>" style="height: 100px;">

                      <input type="hidden" name="oldfavicon" value="<?php echo $sitesettingdata['favicon']; ?>">

                      <p><label>Favicon Upload</label></p>
                      <input type="file" name="favicon">
                    </div>
                    <button type="submit" name="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    <button name="clear" class="btn btn-light">Clear</button>
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