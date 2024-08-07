<?php
$serverame = "localhost";
$user = "root";
$password = "";
$database = "e-commerce";
$conn = new mysqli($serverame, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed" . $conn->connect_error);
}
