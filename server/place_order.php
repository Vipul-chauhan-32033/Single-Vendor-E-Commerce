<?php
session_start();
include "connection.php";

if (!isset($_SESSION['logged_in'])) {
    header("location: ../checkout.php?message=please loggin or register to place the order");
    exit;
} else {
    if (isset($_POST['place_order'])) {


        // 1. Get user info and store it in database

        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $phone = $_POST['user_phone'];
        $city = $_POST['user_city'];
        $address = $_POST['user_address'];
        $o_cost = $_SESSION['total'];
        $o_status = "on_hold";
        $user_id = $_SESSION['u_id'];
        // sesstion set user address
        // $_SESSION['user_address'] = $_POST['user_address'];

        $stmt = $conn->prepare("INSERT INTO orders (o_cost,o_status,user_id,user_phone,user_city,user_address) VALUES (?,?,?,?,?,?)");

        $stmt->bind_param("isiiss", $o_cost, $o_status, $user_id, $phone, $city, $address);
        $stmt->execute();

        // 2. issues new order and store order info in database
        $order_id = $stmt->insert_id;

        // echo $order_id;


        // 3. Get products from cart (from session)
        foreach ($_SESSION['cart'] as $key => $value) {

            $product = $_SESSION['cart'][$key];
            $p_id = $product['id'];
            $p_name = $product['p_name'];
            $p_img = $product['p_img'];
            $p_price = $product['p_price'];
            $p_quantity = $product['p_quantity'];

            // 4. store each single item in order_items database
            $stmt1 = $conn->prepare("INSERT INTO order_item (o_id,p_id,p_name,p_img,p_price,p_quantity,user_id) VALUES(?,?,?,?,?,?,?) ");

            $stmt1->bind_param("iissiii", $order_id, $p_id, $p_name, $p_img, $p_price, $p_quantity, $user_id);

            $stmt1->execute();
        }


        // 5. remove everythig from cart --> delay until payment is done
// unset($_SESSION['cart']);


        // 6. inform user whether everything is fine or there is a problem
        header("location: ../payment.php?order_status= order place successfully!");

    }
}
?>