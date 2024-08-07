<?php
session_start();

include "server/connection.php";

$stmt = $conn->prepare("SELECT * FROM products  ");

$stmt->execute();

$products = $stmt->get_result();

// Assuming your products are stored in an array

// $products = [
//     ['name' => 'Product 1', 'price' => '$10', 'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'],
//     ['name' => 'Product 2', 'price' => '$15', 'description' => 'Lorem ipsum Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.'],
//     ['name' => 'Product 3', 'price' => '$20', 'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea Lorem ipsum commodo consequat.'],
//     // Add more products here
// ];

// Check if search query is set
if (isset($_GET['query'])) {
    $query = $_GET['query'];
    $results = [];

    // Loop through products to find matches
    foreach ($products as $product) {
        if (stripos($product['p_name'], $query) !== false || stripos($product['p_description'], $query) !== false || stripos($product['p_price'], $query) !== false || stripos($product['p_category'], $query) !== false) {
            $results[] = $product;
        }
    }

    // Display search results
    // if (!empty ($results)) {
    //     echo "<h2>Search Results:</h2>";
    //     foreach ($results as $result) {
    //         echo "<div>";
    //         echo "<h3>{$result['name']}</h3>";
    //         echo "<p>{$result['description']}</p>";
    //         echo "<p>Price: {$result['price']}</p>";
    //         echo "</div>";
    //     }
    // } else {
    //     echo "<p>No results found for '{$query}'</p>";
    // }
}
?>
<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search your product</title>

    <!-- Required meta tags -->
    <!-- <link rel="stylesheet" href="assets/css/category.css" /> -->

    <?php include 'includes/headLinks.php' ?>


</head>

<body>
    <?php include 'includes/header.php'; ?>

    <!-- Navigation Bar -->
    <section class=" trending-product mx-0 my-0 " id="men">
        <div class="center-text">
            <h2 class="fashion_tital mb-5">Search Results: </h2>
        </div>
        <div class="product">

            <div class="row">
                <?php if (!empty($results)) {
                    foreach ($results as $row) { ?>

                        <div class="product-col col-lg-3 col-md-6 col-sm-12">
                            <img class="img" src="assets/img/<?php
                            echo $row['p_category'];
                            ?>/<?php
                            echo $row['p_img'];
                            ?>" alt="" class="img-fluid " />
                            <div class="product-text ">
                                <h5>Sale</h5>
                            </div>
                            <div class="heart-icon" name="">
                                <form action="whishlist.php" method="POST">

                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <input type="hidden" name="p_img" value="<?php echo $row['p_img'] ?>">
                                    <input type="hidden" name="p_category" value="<?php echo $row['p_category'] ?>">

                                    <input type="hidden" name="p_name" value="<?php echo $row['p_name'] ?>">
                                    <input type="hidden" name="p_price" value="<?php echo $row['p_price'] ?>">
                                    <!-- <input type="hidden" name="p_quantity" value="<?php echo $row['p_quantity'] ?>"> -->
                                    <!-- <input type="submit" name="whishlist-icon" value="HO" > -->
                                    <button class="" type="submit" name="whishlist-icon"><i class="bx bx-heart"></i></button>
                                    <!-- <a href="whishlist.php?product_id=<?php echo $row['id'] ?>"><i class="bx bx-heart"></i>(HO)</a> -->
                                </form>
                            </div>
                            <div class="ratting  ">
                                <i class="bx bx-star"></i>
                                <i class="bx bx-star"></i>
                                <i class="bx bx-star"></i>
                                <i class="bx bx-star"></i>
                                <i class="bx bx-star-half"></i>
                            </div>
                            <div class="price  ">
                                <h4>
                                    <?php echo $row['p_name'] ?>
                                </h4>
                                <p>$
                                    <?php echo $row['p_price'] ?>
                                </p>
                            </div>
                            <a href="productDetails.php?product_id=<?php echo $row['id'] ?>"><button class="cartBtn">Shop
                                    Now</button></a>
                        </div>
                        <?php
                    }
                } else {
                    echo "<p>No results found for '{$query}'</p>";
                } ?>
            </div>


        </div>
    </section>