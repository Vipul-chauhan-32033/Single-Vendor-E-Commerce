<?php
session_start();

include "server/connection.php";

if (isset($_POST['contact_submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $description = $_POST['description'];

  $sql = "INSERT INTO contact(name,email,phone,description) VALUES ('$name', '$email','$phone', '$description')";

  if ($conn->query($sql) === TRUE) {

    echo "<script>alert('Your data sent Successfully!')</script>";
  } else {
    echo "Something went wrong" . $conn->error;
  }
  $conn->close();

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Get in Touch </title>
  <?php include 'includes/headLinks.php' ?>
</head>

<body>

  <?php include 'includes/header.php' ?>

  <div class="product-section">
    <div class="product-head">
      <img src="assets/img/aboutpage-banner1.png" alt="" />
      <h1 style="color: #fff">Contact</h1>
      <p style="color: #fff">Home / <span>contact</span></p>
    </div>
  </div>
  <div class="container-fluid  mt-3" style="background-color:white">
    <div class="row">
      <div class="column">
        <div class="mapouter">
          <div class="gmap_canvas">
            <iframe
              src="https://maps.google.com/maps?q=R%20K%20World%20tower%20Rajkot&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
              frameborder="0" scrolling="no" style="width: 510px; height: 320px"></iframe>
            <style>
              .mapouter {
                position: relative;
                height: 320px;
                width: 510px;
                background: #fff;
              }

              .maprouter a {
                color: #fff !important;
                position: absolute !important;
                top: 0 !important;
                z-index: 0 !important;
              }
            </style><a href="https://blooketjoin.org/blooket-login/">blooket login</a>
            <style>
              .gmap_canvas {
                overflow: hidden;
                height: 320px;
                width: 510px;
              }

              .gmap_canvas iframe {
                position: relative;
                z-index: 2;
              }
            </style>
          </div>
        </div>
      </div>
      <div class="column ">
        <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" enctype="multipart/form-data">
          <label for="name">Your Name</label>
          <input type="text" id="name" name="name" placeholder="Your name.." />
          <label for="email">Email Address</label>
          <input type="text" id="email" name="email" placeholder="Your email address.." />
          <label for="phone">Phone Number</label>
          <input type="text" id="phone" name="phone" placeholder="Your phone number.." />

          <label for="description">Detail Description</label>
          <textarea id="description" name="description" placeholder="Write something here.."
            style="height: 170px"></textarea>
          <input type="submit" class="btn btn-success" name="contact_submit" value="Submit" />
        </form>
      </div>
    </div>
  </div>
  <?php
  include 'includes/footer.php'
    ?>
</body>

</html>