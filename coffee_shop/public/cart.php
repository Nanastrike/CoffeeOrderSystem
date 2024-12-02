<!--Session part is written by Jiu Cheng, html part is written by Anyi Ding -->
<?php
session_start();

$cart = $_SESSION['cart'] ?? null;

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
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Logout Button -->
<div class="logout-container">
    <a href="logout.php" class="logout-btn">< Logout</a>
</div>

    <div id="cart-container">
        <h1>Your Cart</h1>

        <?php if (!$cart): ?>
            <div id="cart-page">
                <p>Your cart is empty.</p>
                <a href="product-list.php" class="shop-now-btn">Shop now!</a>
            </div>
        <?php else: ?>
            <div class="cart-item">
                <div class="item-details">
                    <span class="cart-item-name"><?php echo $name; ?></span>
                    <span class="cart-item-price">Price: $<?php echo $price; ?></span>
                    <span class="cart-item-quantity">Quantity: <?php echo $quantity; ?></span>
                </div>
                <form action="update_cart.php" method="post" class="item-controls">
                    <input type="hidden" name="name" value="<?php echo $name; ?>">
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <label for="quantity">Add Quantity:</label>
                    <input type="number" name="quantity" id="quantity" value="<?php echo $quantity; ?>" min="1">
                    <button type="submit" class="btn check-btn">Check Total Price</button>
                    <span class="cart-total-price">Total: $<?php echo number_format($total, 2); ?></span>
                </form>
            </div>
            <div class="cart-actions">
                <form action="remove_cart.php" method="post">
                    <button type="submit" class="btn">Clear Cart</button>
                </form>
                <form action="process_order.php" method="POST">
                    <button type="submit" name="process_order" class="btn">Confirm Order</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

