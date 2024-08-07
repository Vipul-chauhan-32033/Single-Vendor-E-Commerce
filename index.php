<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>VG Smart Bazzer --Home</title>
  <?php include 'includes/headLinks.php' ?>
</head>

<body>
  <!-- Navbar section => header file -->
  <?php include 'includes/header.php'; ?>
  <!-- Banner carousel  -->
  <?php include 'includes/bannerSlider.php' ?>

  <!-- Banner carousel  -->
  <section class="m-3">
    <div class="card-deck p-3 center-text">
      <h2 class="fashion_tital mb-5">Today's <span>Deal & Style</span></h2>

      <div class="card p-3 row ">
        <img src="assets/img/todaydeal1.jpg" class="card-img-top img-fluid" alt="..." />
      </div>
      <div class="card p-3 row">
        <img src="assets/img/todaydeal2.jpg" class="card-img-top img-fluid" alt="..." />
      </div>
    </div>
  </section>

  <section class="trending-product">
    <div class="center-text mb-5">
      <h2>Trending <span>Product</span></h2>
      <a href="shop.php">View All</a>
    </div>
    <div class="product">
      <!-- Get The product of the on the DATABASE TABLE -->
      <?php include ('server/get_product.php'); ?>
      <div class="row">
        <?php while ($row = $products->fetch_assoc()) {
          if (isset ($row['p_category']) && !empty ($row['p_category'])) { ?>

            <div class=" product-col col-lg-3 col-md-6 col-sm-12">

              <img class="img-fluid img" src="assets/img/<?php echo $row['p_category'] . "/" . $row['p_img'] ?>" alt="" />
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
                  <input type="hidden" name="p_quantity" value="<?php echo $row['p_quantity'] ?>">
                  <button class="" type="submit" name="whishlist-icon"><i class="bx bx-heart"></i></button>

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
          <?php }
        } ?>

      </div>
    </div>
  </section>
  <section class="trending-product">
    <div class="center-text mb-5">
      <h2>Desginer <span>Product</span></h2>
    </div>
    <div class="product">
      <!-- Get The product of the on the DATABASE TABLE -->
      <?php include ('server/get_product.php'); ?>
      <div class="row">
        <?php while ($row = $products->fetch_assoc()) {
          if (isset ($row['p_category']) && empty ($row['p_category'])) { ?>

            <div class=" product-col col-lg-3 col-md-6 col-sm-12">

              <img class="img-fluid img" src="assets/img/<?php echo $row['p_category'] . "/" . $row['p_img'] ?>" alt="" />
              <div class="product-text">
                <h5>New</h5>
              </div>
              <div class="heart-icon" name="">
                <form action="whishlist.php" method="POST">

                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                  <input type="hidden" name="p_img" value="<?php echo $row['p_img'] ?>">
                  <input type="hidden" name="p_category" value="<?php echo $row['p_category'] ?>">

                  <input type="hidden" name="p_name" value="<?php echo $row['p_name'] ?>">
                  <input type="hidden" name="p_price" value="<?php echo $row['p_price'] ?>">
                  <input type="hidden" name="p_quantity" value="<?php echo $row['p_quantity'] ?>">
                  <button class="" type="submit" name="whishlist-icon"><i class="bx bx-heart"></i></button>

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
          <?php }
        } ?>

      </div>
    </div>
  </section>

  <section class="m-3">
    <div class="intrested-product">
      <h2>You might be intrested in</h2>
      <?php include ('server/get_product.php'); ?>

      <div class="card-collection">
        <?php while ($row = $products->fetch_assoc()) { ?>
          <?php if (isset ($row['p_category']) && $row['p_category'] == "") { ?>

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
                <a href="productDetails.php?product_id=<?php echo $row['id'] ?>"><button class="btn-shop">Shop
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

  <!-- Testimonial start  -->
  <?php include ("includes/testimonial.php") ?>
  <!-- Testimonial End  -->

  <?php include 'includes/footer.php' ?>
</body>

</html>