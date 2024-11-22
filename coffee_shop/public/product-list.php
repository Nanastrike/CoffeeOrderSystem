

<?php   
//TODO:insert the header code here
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


    require_once('../private/database.php');
    $db = db_connect();
    if (!$db) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // return all the coffee in the database
    $sql = "SELECT coffee_name, coffee_price, coffee_description FROM coffee_details "; 
    $sql .= "ORDER BY coffee_name ASC";
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
    <title>Order Coffee</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
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

        <!-- 搜索和筛选 -->
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
            

                <!-- process the result-->
            <?php while ($result = mysqli_fetch_assoc($result_set)){?>
            <!-- 商品1 -->
            <div class="product" data-price="4.5" data-name="Latte">
                <img src="coffee-latte.jpg" alt="Latte" class="product-image">
                <h3 class="product-name">Latte-Hot</h3>
                <p class="product-description">Rich and creamy latte. This is the hot option.</p>
                <p class="product-price">$4.50</p>
                <div class="product-variations">
                    <button class="btn-add-to-cart" onclick="addToCart('Latte', 'Hot')">Add</button>
                </div>
            </div>

            <div class="product" data-price="4.5" data-name="Latte">
                <img src="coffee-latte.jpg" alt="Latte" class="product-image">
                <h3 class="product-name">Latte-Cold</h3>
                <p class="product-description">Rich and creamy latte. This is the cold option.</p>
                <p class="product-price">$4.50</p>
                <div class="product-variations">
                    <button class="btn-add-to-cart" onclick="addToCart('Latte', 'Cold')">Add</button>
                </div>
            </div>

            <!-- 商品2 -->
            <div class="product" data-price="5" data-name="Cappuccino">
                <img src="coffee-Cappuccino.jpg" alt="Cappuccino" class="product-image">
                <h3 class="product-name">Cappuccino-Hot</h3>
                <p class="product-description">A classic Italian coffee. This is the hot option.</p>
                <p class="product-price">$5.00</p>
                <div class="product-variations">
                    <button class="btn-add-to-cart" onclick="addToCart('Cappuccino', 'Hot')">Add</button>
                </div>
            </div>

            <div class="product" data-price="5" data-name="Cappuccino">
                <img src="coffee-Cappuccino.jpg" alt="Cappuccino" class="product-image">
                <h3 class="product-name">Cappuccino-Cold</h3>
                <p class="product-description">A classic Italian coffee. This is the cold option.</p>
                <p class="product-price">$5.00</p>
                <div class="product-variations">
                    <button class="btn-add-to-cart" onclick="addToCart('Cappuccino', 'Cold')">Add</button>
                </div>
            </div>
        </div>

        <button class="btn" id="go-to-cart" onclick="window.location.href='cart.php'">Go to Cart</button>
        </div>
            <?php } ?>

        <!--TO DO: add a fixed footer php file
        <?php include 'footerEm.php'; ?> 
        -->
</body>
</html>
