<?php
session_start();

// Retrieve product data from the form
$name = $_POST['name'] ?? null;
$price = $_POST['price'] ?? null;
$quantity = $_POST['quantity'] ?? 1;

if ($name && $price) {
    // Create an associative array for the item
    $item = [
        'name' => $name,
        'price' => $price,
        'quantity' => $quantity,
    ];

    // Store the item in the session cart
    // Since only one item is allowed, we'll overwrite any existing item
    $_SESSION['cart'] = $item;

    // Redirect back to the product list or cart page
    header('Location: cart.php');
    exit();
} else {
    // Handle the error if product data is missing
    echo "Error: Product information is missing.";
}
?>
