<?php
include 'connection.php';

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];


    $sql = "INSERT INTO users(name,email,phone,password) VALUES ('$name', '$email','$phone', '$password')";

    if ($conn->query($sql) === TRUE) {

        echo "You Are Registered";
    } else {
        echo "Somthing went wrong" . $conn->error;
    }
    $conn->close();

} else
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        //to prevent from mysqli injection 
        $email = stripcslashes($email);
        $password = stripcslashes($password);
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);


        $sql = "SELECT FROM users email = '$email' AND password = '$password'";

        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if ($count == 1) {

            echo "You Are Login";
        } else {
            echo "Somthing went wrong" . $conn->error;
        }
        $conn->close();

    }

?>