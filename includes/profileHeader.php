<?php
include "server/sql_crud_operation.php";

$sitesettingdata = selectdatabyid("sitesettings", "1");

?>
<!Doctype html>
<html lang="en" data-bs-theme="light">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Information</title>

    <link rel="stylesheet" href="assets/vendors/mapbox-gl/mapbox-gl.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" href="assets/img/<?= $sitesettingdata['favicon'] ?>" />

    <!-- GOOGLE FONTS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- GOOGLE FONTS -->

    <link rel="stylesheet" href="assets/css/theme.css">

    <link rel="stylesheet" href="assets/css/local.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="assets/css/navbar.css">


</head>