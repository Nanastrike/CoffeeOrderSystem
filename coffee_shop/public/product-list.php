<?php
//this following part is written by Luo Qinyu 
session_start();   
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//connect database
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

<!-- Logout Button -->
<div class="logout-container">
    <a href="logout.php" class="logout-btn">< Logout</a>
</div>

    <div class="page" id="order-page">
        <h1>Select Your Coffee</h1>
        <div class="store-info">
            <h2 class="store-name">Douje Coffee</h2>
            <p>New users can receive a cup of coffee for free. Please note that you can only choose one type coffee.</p>
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
        <!--this following part is written by Luo Qinyu -->
        <?php while ($result = mysqli_fetch_assoc($result_set)){?>
            <!--establish the products by retrive data from database-->
            <div class="product">
                <img src="<?php echo htmlspecialchars($result['image_path']); ?>" alt="<?php echo htmlspecialchars($result['coffee_name']); ?>" class="product-image">
                <h3 class="product-name" name="product-name"><?php echo htmlspecialchars($result['coffee_name']);?></h3>
                <p class="product-description" name="product-description"><?php echo htmlspecialchars($result['coffee_description']); ?></p>
                <p class="product-price" name="product-price"><?php echo htmlspecialchars ($result['coffee_price']); ?></p>

                <!-- Add to Cart Form -->
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($result['coffee_name']); ?>">
                    <input type="hidden" name="price" value="<?php echo htmlspecialchars($result['coffee_price']); ?>">
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit" class="btn-add-to-cart">Add to Cart</button>
                </form>
            </div>
        
        <?php } ?>
        
            <button class="btn" id="go-to-cart" onclick="window.location.href='cart.php'">Go to Cart</button>
        </div>
</body>
</html>
