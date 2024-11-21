<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../private/database.php');
$db = db_connect();

//handle form values sent by cart.php
if ($_SERVER['REQUEST_METHOD']==='POST'){ //if user clicks the submit button
    $cart = $_SESSION['cart']??null;

    $userId = 1;

    // Insert the single item directly into the database
    $sql = "INSERT INTO order_list (product_name,product_price, product_num, registration_user_id) VALUES(
        '" . mysqli_real_escape_string($db, $cart['name']) . "',
        '" . mysqli_real_escape_string($db, $cart['price']) . "',
        '" . mysqli_real_escape_string($db, $cart['quantity']) . "',
        $userId
        )";
    $result = mysqli_query($db, $sql);

    header("Location: order-list.php");
    exit();
} else{
    header("Location: cart.php");
    exit();
}

?>

