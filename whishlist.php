<?php

include "server/connection.php";
session_start();
if (isset($_POST['whishlist-icon'])) {

    // if user has already added a product to whishlist 
    if (isset($_SESSION['whishlist'])) {
        $p_array_ids = array_column($_SESSION['whishlist'], "id"); // [2,3,4,5,14]

        // if product has already been added wishlist or not
        if (!in_array($_POST['id'], $p_array_ids)) {
            $id = $_POST['id'];
            $p_array = array(
                'id' => $_POST['id'],
                'p_name' => $_POST['p_name'],
                'p_img' => $_POST['p_img'],
                'p_category' => $_POST['p_category'],
                'p_price' => $_POST['p_price'],
                // 'p_quantity' => $_POST['p_quantity']
            );
            $_SESSION['whishlist'][$id] = $p_array;


        }
        // product has already been added
        else {
            echo "<script>alert('Already added to whishlist')</script>";
            // echo "<script>window.location.href='index.php'</script>";
        }

    }
    // if this is the first product
    else {
        $id = $_POST['id'];
        $p_name = $_POST['p_name'];
        $p_img = $_POST['p_img'];

        $p_category = $_POST['p_category'];
        $p_price = $_POST['p_price'];
        // $p_quantity = $_POST['p_quantity'];

        $p_array = array(
            'id' => $id,
            'p_name' => $p_name,
            'p_img' => $p_img,
            'p_category' => $p_category,
            'p_price' => $p_price,
            // 'p_quantity' => $p_quantity
        );
        $_SESSION['whishlist'][$id] = $p_array;


    }
    // upadate the total product quantity

}

// Remove from cart product 
elseif (isset($_POST['rem_whishlist'])) {

    $id = $_POST['id'];
    unset($_SESSION['whishlist'][$id]);

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VG Smart Bazzar</title>
    <link rel="shortcut icon" href="assets/img/mylogo3.png" type="image/x-icon" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/cart.css">

    <link rel="stylesheet" href="assets/css/whishlist.css" />
    <?php include 'includes/headLinks.php' ?>

</head>

<body>
    <?php include 'includes/header.php'; ?>

    <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h2>Whishlist</h2>
            <hr />
        </div>
        <div class="row mx-auto container-fluid ">
            <?php if (isset($_SESSION['whishlist'])) { ?>
                <?php

                foreach ($_SESSION['whishlist'] as $key => $value) {

                    ?>

                    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                        <img src="assets/img/<?php echo $value['p_category'] . "/" . $value['p_img']; ?>"
                            class="img-fluid mb-3 img" />
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h5 class="p-name">
                            <?php echo $value['p_name'] ?>
                        </h5>
                        <h5 class="p-price">$
                            <?php echo $value['p_price'] ?>
                        </h5>
                        <form action="cart.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $value['id'] ?>">
                            <input type="hidden" name="p_img" value="<?php echo $value['p_img'] ?>">
                            <input type="hidden" name="p_category" value="<?php echo $value['p_category'] ?>">

                            <input type="hidden" name="p_name" value="<?php echo $value['p_name'] ?>">
                            <input type="hidden" name="p_price" value="<?php echo $value['p_price'] ?>">

                        </form>
                        <a href="productDetails.php?product_id=<?php echo $value['id'] ?>"><button class="buy-btn ">Shop
                                Now</button></a>
                        <form action="whishlist.php" method="post">
                            <input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                            <input class="buy-btn" type="submit" value="Remove" name="rem_whishlist">
                            <!-- <i class="fa fa-trash"></i> -->
                        </form>

                    </div>
                <?php }
            } else { ?>

                <h3 class="w-100 text-center" style="color: gray">Your Whishlilst is empty!</h3>
            <?php } ?>
        </div>
    </section>
    <?php include 'includes/footer.php'; ?>

</body>

</html>