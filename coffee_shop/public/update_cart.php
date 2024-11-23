<?php
session_start();

// Retrieve updated quantity from the form
$name = $_POST['name'] ?? null;
$price = $_POST['price'] ?? null;
$quantity = $_POST['quantity'] ?? 1;

if ($name && $price && $quantity) {
    // Update the item in the session cart
    $_SESSION['cart'] = [
        'name' => $name,
        'price' => $price,
        'quantity' => $quantity,
    ];

    // Redirect back to the cart page
    header('Location: cart.php');
    exit();
} else {
    // Handle the error if data is missing
    echo "Error: Unable to update the cart.";
}
?>
