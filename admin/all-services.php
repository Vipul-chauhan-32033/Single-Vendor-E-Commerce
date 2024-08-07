<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>All Services</title>
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
                    <h4 class="card-title">All Services</h4>
                    <div class="card">
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Sr.No</th>
                          <th>Name</th>
                          <th>Image</th>
                          <th>Icon</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Jacob</td>
                          <td>53275531</td>
                          <td>12 May 2017</td>
                          <td>12 May 2017</td>
                          <td><label class="badge badge-danger">Pending</label>
                            <label class="badge badge-success">Completed</label>
                          </td>
                        </tr>
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