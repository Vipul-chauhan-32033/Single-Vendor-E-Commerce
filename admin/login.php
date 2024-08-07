<?php

session_start();
include "../server/connection.php";

// if the user already logged_in then redirect profile page
if (isset($_SESSION['admin_logged_in'])) {
    header("location:index.php");
    exit;
}

// if user is not login then first login 
if (isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']); // input password convert to md5 algorithem and store $password variable;
    $error = "";

    // fetch email and password in users table
    $stmt = $conn->prepare("SELECT * FROM admins where admin_email=? AND admin_password=? LIMIT 1");
    $stmt->bind_param("ss", $email, $password);
    if ($stmt->execute()) {

        $stmt->bind_result($admin_id, $admin_name, $admin_email, $admin_password);
        $stmt->store_result();
        if ($stmt->num_rows() == 1) {
            $stmt->fetch();
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['admin_logged_in'] = true;
            header("location: index.php?login_success=Logged in successfully");

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
    <title>Login User</title>
    <link rel="stylesheet" href="../assets/css/forms.css" />
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
                            Login
                        </button>

                    </div>

                </div>
            </form>
        </div>
    </div>

</body>

</html>