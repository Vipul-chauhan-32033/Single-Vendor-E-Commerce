<?php

include 'server/connection.php';
session_start();

if (isset ($_POST['add_to_cart'])) {

  // if user has already added a product to cart 
  if (isset ($_SESSION['cart'])) {
    $p_array_ids = array_column($_SESSION['cart'], "id"); // [2,3,4,5,14]

    // if product has already been added cart or not
    if (!in_array($_POST['id'], $p_array_ids)) {
      $id = $_POST['id'];
      $p_array = array(
        'id' => $_POST['id'],
        'p_name' => $_POST['p_name'],
        'p_img' => $_POST['p_img'],
        'p_category' => $_POST['p_category'],
        'p_price' => $_POST['p_price'],
        'p_quantity' => $_POST['p_quantity']
      );
      $_SESSION['cart'][$id] = $p_array;


    }
    // product has already been added
    else {
      echo "<script>alert('Product was already added')</script>";
      // echo "<script>window.location.href='index.php'</script>";
    }
    // header("location: cart.php");

  }
  // if this is the first product
  else {
    $id = $_POST['id'];
    $p_name = $_POST['p_name'];
    $p_img = $_POST['p_img'];
    $p_category = $_POST['p_category'];
    $p_price = $_POST['p_price'];
    $p_quantity = $_POST['p_quantity'];

    $p_array = array(
      'id' => $id,
      'p_name' => $p_name,
      'p_img' => $p_img,
      'p_category' => $p_category,
      'p_price' => $p_price,
      'p_quantity' => $p_quantity
    );
    $_SESSION['cart'][$id] = $p_array;


  }
  // upadate the total product quantity
  total_quantity();

}




// Remove from cart product 
elseif (isset ($_POST['remove_p'])) {

  $id = $_POST['id'];
  unset($_SESSION['cart'][$id]);
  // upadate the total product quantity
  total_quantity();
} elseif (isset ($_POST['change'])) {
  // we get the id and quantity from the form

  $id = $_POST['id'];
  $p_quantity = $_POST['p_quantity'];

  // Get the product from the session
  $p_array = $_SESSION['cart'][$id];
  // update product quantity
  $p_array['p_quantity'] = $p_quantity;
  //  return array back its place
  $_SESSION['cart'][$id] = $p_array;



  // upadate the total product quantity
  total_quantity();


} else {
  // header("location: cart.php");

}


function total_quantity()
{
  $total = 0;
  foreach ($_SESSION['cart'] as $key => $value) {

    $product = $_SESSION['cart'][$key];

    $price = $product['p_price'];
    $quantity = $product['p_quantity'];

    $total = $total + ($price * $quantity);

  }
  return $_SESSION["total"] = $total;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Products of the Ecommerce Cart</title>
  <?php include "includes/headLinks.php" ?>
  <link rel="stylesheet" href="assets/css/cart.css">
</head>

<body>
  <?php include "includes/header.php" ?>


  <section class="cart container my-2 py-2" name="cart">
    <div class="container text-center mt-5 py-5">
      <h2>Your Cart</h2>
      <hr />
    </div>

    <?php if (isset ($_SESSION['cart'])) { ?>
      <table class="mt-5 pt-5">
        <tr>
          <th>Products</th>
          <th>Quantity</th>
          <th>SubTotal</th>
          <th>Action</th>
        </tr>
        <?php

        foreach ($_SESSION['cart'] as $key => $value) {

          ?>
          <tr>

            <td>
              <div class="product-info">
                <img src="assets/img/<?php echo $value['p_category'] . "/" . $value['p_img']; ?>" alt="" />
                <div>
                  <p>
                    <?php echo $value['p_name']; ?>
                  </p>
                  <small><span>$</span>
                    <?php echo $value['p_price']; ?>
                  </small>
                </div>
              </div>
            </td>
            <td>
              <form action="cart.php" class="d-flex " method="post">
                <input type="hidden" value="<?php echo $value['id']; ?>" name="id">

                <input type="number" value="<?php echo $value['p_quantity']; ?>" name="p_quantity" id=" " />
                <input class="btn change w-100" type="submit" value="Change" name="change">
              </form>
            </td>
            <td>$
              <?php echo $value['p_quantity'] * $value['p_price']; ?>
            </td>
            <td>
              <form action="cart.php" method="post">
                <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                <input class="btn btn-danger btn-sm w-100 remove" type="submit" value="Remove" name="remove_p">
                <!-- <i class="fa fa-trash"></i> -->
              </form>

            </td>
          </tr>
        <?php }
        ?>
      </table>
      <div class="cart-total">
        <table>
          <tr>
            <td>Total</td>
            <td>$
              <?php echo $_SESSION['total'] ?>
            </td>
          </tr>
        </table>
      </div>
      <div class="checkout">
        <form action="checkout.php" method="post" name="checkout_form">
          <input type="submit" class="btn checkout-btn" value="Checkout" name="checkout">

        </form>
      </div>

    <?php } else { ?>
      <h3 class="w-100 text-center" style="color: gray">Please select the product!</h3>
    <?php } ?>
  </section>


  <?php include "includes/footer.php"; ?>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>