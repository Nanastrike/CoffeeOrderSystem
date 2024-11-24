<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../private/database.php');
$db = db_connect();
if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// get the order list from the database
$sql = "SELECT order_id, product_name, product_price, product_num FROM order_list";
//execute the query
$result_set = mysqli_query($db, $sql);
if (!$result_set) {
    die("Database query failed: " . mysqli_error($db));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="page" id="order-success-page">
        <h1>Your Orders</h1>
        <div class="order-list" name="order-list">
            <!-- process the result-->
            <?php while ($result = mysqli_fetch_assoc($result_set)){
                $product_name = htmlspecialchars($result['product_name']);
                $product_price = (float)$result['product_price'];
                $product_num = (int)$result['product_num'];
                $total_price = $product_price * $product_num;
            ?>
            <div class="order" name="order">
                <h2 name="order-id">OrderID:<?php echo htmlspecialchars($result['order_id']);?></h2>
                <ul name="items">
                    <li name="item"><?php echo htmlspecialchars($result['product_name']);?></li>
                    <li name="price">Unit Price:<?php echo htmlspecialchars($result['product_price']);?></li>
                    <li name="num">Number:<?php echo htmlspecialchars($result['product_num']);?></li>
                </ul>
                <p name="total-price">Total Price: $<?php echo number_format($total_price, 2); ?></p>
            </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
