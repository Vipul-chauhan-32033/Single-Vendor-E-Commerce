<?php

session_start();
include "server/connection.php";

// if the user already logged_in then redirect profile page
if (isset($_SESSION['logged_in'])) {
  header("location:profile.php");
  exit;
}

// if user is not login then first login 
if (isset($_POST['loginBtn'])) {
  $email = $_POST['email'];
  $password = md5($_POST['password']); // input password convert to md5 algorithem and store $password variable;
  $error = "";

  // fetch email and password in users table
  $stmt = $conn->prepare("SELECT * FROM users where email=? AND password=? LIMIT 1");
  $stmt->bind_param("ss", $email, $password);
  if ($stmt->execute()) {

    $stmt->bind_result($u_id, $u_name, $u_email, $u_phone, $u_password, $u_img, $u_address);
    $stmt->store_result();
    if ($stmt->num_rows() == 1) {
      $stmt->fetch();
      $_SESSION['u_id'] = $u_id;
      $_SESSION['u_name'] = $u_name;
      $_SESSION['u_email'] = $u_email;
      $_SESSION['u_phone'] = $u_phone;
      $_SESSION['u_img'] = $u_img;
      $_SESSION['u_address'] = $u_address;
      $_SESSION['logged_in'] = true;
      header("location: profile.php?login_success=Logged in successfully");

    } else {
      // header("location: login.php?error=there is no account created");
      $error = "Account Not Exist!";
    }

  } else {
    // header("location: login.php?error=Something went wrong");
    $error = "Something Wents Wrong!";
  }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Users </title>
  <link rel="icon" href="assets/img/mylogo3.png" />

  <link rel="stylesheet" href="assets/css/forms.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div class="container">
    <div class="form-box">
      <h1 id="title">Sign In</h1>
      <form action="login.php" name="myform" method="post" enctype="multipart/form-data">
        <div class="error">
          <?php if (isset($error)) {
            echo $error;
          } ?>
        </div>
        <div class="input-group" id="inputGroup">


          <div class="input-field" id="emailField">
            <i class="fa-regular fa-envelope"></i>
            <input type="email" name="email" id="email" placeholder="Enter Email Address" required />
          </div>
          <div class="input-field" id="emailField">
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Enter Password" required />
          </div>

          <div class="btn-field">
            <button type="submit" id="loginBtn" name="loginBtn">
              CONTINUE
            </button>

          </div>
          <div class="new_user">
            <p>New user? <a href="register.php">Sign Up</a></p>

          </div>
        </div>
      </form>
    </div>
  </div>

</body>

</html>