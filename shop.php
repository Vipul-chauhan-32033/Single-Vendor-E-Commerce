<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Categories of Cloths-Department E-Commerce Web</title>

  <!-- Required meta tags -->
  <link rel="stylesheet" href="assets/css/category.css" />

  <?php include 'includes/headLinks.php' ?>


</head>

<body>
  <!-- Navigation Bar -->
  <?php include 'includes/header.php' ?>

  <!-- Navigation Bar -->

  <!-- <div class=""> -->
  <div class="category-header mt-5">
    <div class="category-img">
      <img src="assets/img/categoryBanner.png" class="img-fluid " alt="" />
      <h1 class="img-text">BEACAUSE IT'S <br />SHOP O'CLOCK <br />HERE</h1>
    </div>
  </div>

  <section class=" trending-product mx-0 my-4" id="men">
    <div class="center-text">
      <h2 class="fashion_tital">Men's <span>Clothing Style</span></h2>
    </div>
    <div class="product">
      <?php include('server/get_product.php'); ?>
      <div class="row">
        <?php while ($row = $products->fetch_assoc()) {
          if (isset($row['p_category']) && $row['p_category'] == "men") { ?>
            <div class="product-col col-lg-3 col-md-6 col-sm-12">
              <img class="img" src="assets/img/men/<?php
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
        } ?>
      </div>


    </div>
  </section>
  <section class="trending-product mx-0 my-4" id="women">
    <div class="center-text">
      <h2 class="fashion_tital">Women's <span>Fashion Style</span></h2>
    </div>
    <div class="product">
      <?php include('server/get_product.php'); ?>
      <div class="row">
        <?php while ($row = $products->fetch_assoc()) {
          if (isset($row['p_category']) && $row['p_category'] == "women") { ?>
            <div class=" product-col col-lg-3 col-md-6 col-sm-12">

              <img class="img" src="assets/img/women/<?php
              echo $row['p_img'];
              ?>" alt="" />
              <div class="product-text">
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
              <div class="ratting">
                <i class="bx bx-star"></i>
                <i class="bx bx-star"></i>
                <i class="bx bx-star"></i>
                <i class="bx bx-star"></i>
                <i class="bx bx-star-half"></i>
              </div>
              <div class="price">
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
        } ?>
      </div>


    </div>
  </section>

  <section class="trending-product mx-0 my-4" id="kid">
    <div class="center-text">
      <h2 class="fashion_tital">kid's <span> Style</span></h2>

    </div>
    <div class="product">
      <?php include('server/get_product.php'); ?>
      <div class="row">
        <?php while ($row = $products->fetch_assoc()) { ?>
          <?php if (isset($row['p_category']) && $row['p_category'] == "women") { ?>
            <div class=" product-col col-lg-3 col-md-6 col-sm-12">

              <img class="img" src="assets/img/women/<?php
              echo $row['p_img'];
              ?>" alt="" />
              <div class="product-text">
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
              <div class="ratting">
                <i class="bx bx-star"></i>
                <i class="bx bx-star"></i>
                <i class="bx bx-star"></i>
                <i class="bx bx-star"></i>
                <i class="bx bx-star-half"></i>
              </div>
              <div class="price">
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
        } ?>
      </div>


    </div>
  </section>


  <!-- </div> -->

  <?php include 'includes/footer.php' ?>
</body>

</html>