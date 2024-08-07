<?php
include "server/sql_crud_operation.php";

$sitesettingdata = selectdatabyid("sitesettings", "1");

?><!-- Required meta tags -->
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
<link rel="icon" href="assets/img/<?= $sitesettingdata['favicon'] ?>" />
<!-- Bootstrap CSS Web link or File-->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" /> -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css">

<!-- Custome stylesheet -->
<link rel="stylesheet" href="assets/css/style.css" />
<link rel="stylesheet" href="assets/css/product.css" />

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />

<link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="assets/css/all.min.css">

<!-- fonts -->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
<!-- font awesome -->
<link rel="stylesheet" href="https://kit.fontawesome.com/a076d05399.js" />

<link rel="stylesheet" type="text/css"
    href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<!-- Swiper of testimonial  -->
<link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />