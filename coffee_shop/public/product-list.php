<?php
session_start();   
//TODO:insert the header code here
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    require_once('../private/database.php');
    $db = db_connect();
    if (!$db) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Return all the coffee in the database
    $sql = "SELECT coffee_name, coffee_price, coffee_description, image_path FROM coffee_details "; 
    $sql .= "ORDER BY coffee_name ASC";
    //Execute the query
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
    <title>Order Coffee</title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts/search-filter.js" defer></script>
</head>
<body>
    <div class="page" id="order-page">
        <div class="brand-banner">
            <img src="banner.jpg" alt="Coffee Paradise Banner">
        </div>
        <h1>Select Your Coffee</h1>
        <div class="store-info">
            <h2 class="store-name">Coffee Paradise</h2>
            <p>New users can receive a cup of coffee for free. Please note that you can only choose one cup of coffee.</p>
        </div>

        <!-- Search and Filter -->
        <div class="filter-search">
            <input type="text" id="search-input" placeholder="Search by name..." oninput="searchProducts()">
            <select id="price-filter" onchange="filterByPrice()">
                <option value="">Filter by price</option>
                <option value="low">Under $5</option>
                <option value="mid">$5 - $10</option>
                <option value="high">Above $10</option>
            </select>
        </div>

        <div class="products">
        <!-- Process the result -->
        <?php while ($result = mysqli_fetch_assoc($result_set)){?>

            <div class="product">
                <img src="<?php echo htmlspecialchars($result['image_path']); ?>" alt="<?php echo htmlspecialchars($result['coffee_name']); ?>" class="product-image">
                <h3 class="product-name" name="product-name"><?php echo htmlspecialchars($result['coffee_name']);?></h3>
                <p class="product-description" name="product-description"><?php echo htmlspecialchars($result['coffee_description']); ?></p>
                <p class="product-price" name="product-price"><?php echo htmlspecialchars ($result['coffee_price']); ?></p>

                <!-- Add to Cart Form -->
                <form action="add_to_cart.php" method="post">
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($result['coffee_name']); ?>">
                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($result['coffee_price']); ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn-add-to-cart">Add to Cart</button>
                </form>
            </div>
        
        <?php } ?>
        
            <button class="btn" id="go-to-cart" onclick="window.location.href='cart.php'">Go to Cart</button>

        <!--TO DO: add a fixed footer php file
        <?php include 'footerEm.php'; ?> 
        -->
        </div>
</body>
</html>
