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
                    <h4 class="card-title">Add Service</h4><br>
                    <form class="forms-sample">
                      <div class="form-group">
                        <label>Image Upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputName1">Service Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Service Name">
                      </div>
                      <div class="form-group">
                        <label>Icon Upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-gradient-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Status</label>
                        <select class="form-control" id="exampleSelectGender">
                          <option>Active</option>
                          <option>InActive</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleTextarea1">Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
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