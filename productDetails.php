<?php

include "server/connection.php";
session_start();

if (isset($_GET['product_id'])) {


    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE id=? ");
    $stmt->bind_param("i", $product_id);

    $stmt->execute();

    $single_product = $stmt->get_result();
} else {

    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>You have selected these Product </title>
    <?php include 'includes/headLinks.php' ?>
    <link rel="stylesheet" href="assets/css/single_product.css">
</head>

<body>

    <?php
    include 'includes/header.php'
        ?>

    <!-- Navigation Bar -->
    <div class="product-section">
        <!-- <div class="product-head">
            <img src="assets/img/productBanner.jpg" alt="">
            <h1>Product</h1>
            <p>Home / <span>Men</span></p>
        </div> -->
        <div class="product-body">

            <section id="pdetails" class="section-p1">
                <?php while ($row = $single_product->fetch_assoc()) { ?>
                    <div class="single-pimg">
                        <img src="assets/img/<?php echo $row['p_category'] . "/" . $row['p_img'] ?>" alt="" width="100%"
                            id="Mainimg" />
                        <div class="small-img-group">
                            <div class="small-img-col">
                                <img src="assets/img/<?php echo $row['p_category'] . "/" . $row['p_img'] ?>"
                                    class="small-img" width="100%" alt="" />
                            </div>
                            <?php if (!empty($row['p_small_img2'])) { ?>

                                <div class="small-img-col">
                                    <img src="assets/img/<?php echo $row['p_category'] . "/" . $row['p_small_img2'] ?>"
                                        class="small-img" alt="" width="100%" />
                                </div>
                                <div class="small-img-col">
                                    <img src="assets/img/<?php echo $row['p_category'] . "/" . $row['p_small_img3'] ?>"
                                        class="small-img" alt="" width="100%" />
                                </div>
                                <div class="small-img-col">
                                    <img src="assets/img/<?php echo $row['p_category'] . "/" . $row['p_small_img4'] ?>"
                                        class="small-img" alt="" width="100%" />
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="single-pdetails">
                        <h4>
                            <?php echo $row['p_name'] ?>
                        </h4>
                        <h2>$
                            <?php echo $row['p_price'] ?>
                        </h2>
                        <select>
                            <option value="">Select Size</option>
                            <option value="">XL</option>
                            <option value="">XXL</option>
                            <option value="">S</option>
                            <option value="">M</option>
                            <option value="">XXXL</option>
                        </select>
                        <form action="cart.php?result=your-selected-product-is-<?php echo $row['p_name'] ?>" method="POST">
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <input type="hidden" name="p_img" value="<?php echo $row['p_img'] ?>">
                            <input type="hidden" name="p_category" value="<?php echo $row['p_category'] ?>">

                            <input type="hidden" name="p_name" value="<?php echo $row['p_name'] ?>">
                            <input type="hidden" name="p_price" value="<?php echo $row['p_price'] ?>">
                            <input type="number" name="p_quantity" value="1" />
                            <button class="normal" type="submit" name="add_to_cart">Add To Cart</button>
                        </form>

                        <h4>Product Details</h4>
                        <span>
                            <?php echo $row['p_description'] ?>
                        </span>
                    </div>
                <?php } ?>

            </section>


        </div>

        <section class="m-3">
            <div class="intrested-product">
                <h2>You might be intrested in</h2>
                <?php include('server/get_product.php'); ?>

                <div class="card-collection">
                    <?php while ($row = $products->fetch_assoc()) { ?>
                        <!-- <?php if (isset($row['p_category']) && $row['p_category'] == "") { ?> -->

                            <div class="intrested-product-card">
                                <div class="intrested-img">
                                    <img src="assets/img/<?php
                                    echo $row['p_img'] ?>" alt="" />
                                </div>
                                <div class="intrested-details">
                                    <h2>
                                        <?php
                                        echo $row['p_name'] ?>
                                    </h2>
                                    <h4>
                                        <?php
                                        echo $row['p_description'] ?>
                                    </h4>
                                    <a href="productDetails.php?product_id=<?php echo $row['id'] ?>"><button
                                            class="btn-shop">Shop
                                            Now</button></a>
                                </div>
                            </div>
                            <?php
                        }
                    } ?>

                </div>
                <button class="left" id="left">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button class="right" id="right">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
        </section>
        <div class="intrested-product">
            <h2>Similar Product</h2>
            <div class="card-collection" id="cardCollection">


                <div class="intrested-product-card">
                    <div class="intrested-img"><img src="assets/img/kid1.png" alt=""></div>
                    <div class="intrested-details">
                        <h2>Men's Jackets</h2>
                        <h4>Min. 50% off</h4>
                        <button class="btn-shop">Shop Now</button>
                    </div>
                </div>
                <div class="intrested-product-card">
                    <div class="intrested-img"><img src="assets/img/cardImg5.avif" alt=""></div>
                    <div class="intrested-details">
                        <h2>Men's Jackets</h2>
                        <h4>Min. 50% off</h4>
                        <button class="btn-shop">Shop Now</button>
                    </div>
                </div>
                <div class="intrested-product-card">
                    <div class="intrested-img"><img src="assets/img/kid2_poster.png" alt=""></div>
                    <div class="intrested-details">
                        <h2>Men's Jackets</h2>
                        <h4>Min. 50% off</h4>
                        <button class="btn-shop">Shop Now</button>
                    </div>
                </div>
                <div class="intrested-product-card">
                    <div class="intrested-img"><img src="assets/img/cardImg2.avif" alt=""></div>
                    <div class="intrested-details">
                        <h2>Men's Jackets</h2>
                        <h4>Min. 50% off</h4>
                        <button class="btn-shop">Shop Now</button>
                    </div>
                </div>
                <div class="intrested-product-card">
                    <div class="intrested-img"><img src="assets/img/kid5.png" alt=""></div>
                    <div class="intrested-details">
                        <h2>Men's Jackets</h2>
                        <h4>Min. 50% off</h4>
                        <button class="btn-shop">Shop Now</button>
                    </div>
                </div>
            </div>
            <button class="left" id="leftside"><i class="fa-solid fa-angle-left"></i></button>
            <button class="right" id="rightside"><i class="fa-solid fa-angle-right"></i></button>
        </div>
        <!-- <h1>New Updates</h1> -->
    </div>
    </div>




    <?php include 'includes/footer.php' ?>

    <script src="assets/js/scroll.js"></script>
    <script src="assets/js/change_img.js"></script>

</body>

</html>