<?php
session_start();

$cart = $_SESSION['cart'] ?? null; // Access the single item in the cart

if ($cart) {
    $name = htmlspecialchars($cart['name']);
    $price = htmlspecialchars($cart['price']);
    $quantity = htmlspecialchars($cart['quantity']);
    $total = $price * $quantity;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
</head>
<body>
    <h1>Your Cart</h1>

    <?php if (!$cart): ?>
        <p>Your cart is empty. <a href="product-list.php">Shop now!</a></p>
    <?php else: ?>
        <div class="cart-item">
            <h3 class="cart-item-name"><?php echo $name; ?></h3>
            <p class="cart-item-price">Price: $<?php echo $price; ?></p>
            <p class="cart-item-quantity">Quantity: <?php echo $quantity; ?></p>
            <p class="cart-total">Total: $<?php echo number_format($total, 2); ?></p>
        </div>
        <form action="process_order.php" method="POST">
            <button type="submit" name="process_order" class="btn">Confirm Order</button>
        </form>
    <?php endif; ?>
</body>
</html>
