<?php

session_start();
include("server/connection.php");


// if the user already logged_in then redirect profile page
if (isset($_SESSION['logged_in'])) {
    header("location:profile.php");
    exit;
}


// if user is not register then first Register 
if (isset($_POST['register'])) {

    $name = $_POST['name']; //user name
    $email = $_POST['email']; // email
    $phone = $_POST['phone']; // phone
    $password = $_POST['password']; // password
    $cpass = $_POST['cpass']; // confirm password
    $error = "";
    // hash password to encrypt password
    // $hash_password = password_hash($password, PASSWORD_DEFAULT);

    // if password and confirm password are not same
    if ($password != $cpass) {
        // header("location: register.php?error=Password does not match");
        $error = "Password does not match";
    }
    // if password at least 6 character
    else if (strlen($password) < 6) {
        // header("location: register.php?error=password legnth minimum 6 character");
        $error = "Password legnth minimum 6 character";

    } else {
        // check wether the email already exist then

        $stmt1 = $conn->prepare("SELECT count(*) FROM users where email=?");
        $stmt1->bind_param("s", $email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();

        // if there is user already register existence email
        if ($num_rows >= 1) {
            // header("location: register.php?error=Email address already Exists");
            $error = "Email address already Exists";
        }

        // if there is no user register then create new user
        else {
            // creating a new user and insert to database
            $stmt = $conn->prepare("INSERT INTO users (name, email, phone, password) VALUES(?,?,?,?)");
            $stmt->bind_param('ssis', $name, $email, $phone, md5($password));
            if ($stmt->execute()) {
                $user_id = $stmt->insert_id;
                $_SESSION['u_id'] = $user_id;
                $_SESSION['u_email'] = $email;
                $_SESSION['u_name'] = $name;
                $_SESSION['u_phone'] = $phone;
                $_SESSION['logged_in'] = true;
                header("location: login.php?register_success=you registered successfully");
            }
            // else you are not register
            else {
                header("location:register.php?error=could not create an account");
            }

        }
        $conn->close();


    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register user</title>
    <link rel="icon" href="assets/img/mylogo3.png" />

    <link rel="stylesheet" href="assets/css/forms.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container">
        <div class="form-box">
            <h1 id="title">Sign Up</h1>
            <form action="register.php" name="myform" method="post" enctype="multipart/form-data">
                <div class="error text-center">
                    <?php if (isset($error)) {
                        echo $error;
                    } ?>
                </div>
                <div class="input-group" id="inputGroup">
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="name" id="name" placeholder="Enter Your Name" required />
                    </div>
                    <div class="input-field" id="emailField">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Enter Email Address" required />
                    </div>
                    <div class="input-field" id="phoneField">
                        <i class="fa-solid fa-phone"></i>
                        <input type="tel" name="phone" id="phone" placeholder="Enter Phone Number" required />
                    </div>
                    <div class="input-field" id="passwordField">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Enter Password" required />
                    </div>
                    <div class="input-field" id="cPassField">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="cpass" id="cpass" placeholder="Enter Confirm Password" />
                    </div>
                    <div class="btn-field">
                        <button type="submit" id="register" name="register">
                            Register
                        </button>

                    </div>
                    <div class="new_user">
                        <p>Already have an account? <a href="login.php">Sign In</a></p>

                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>