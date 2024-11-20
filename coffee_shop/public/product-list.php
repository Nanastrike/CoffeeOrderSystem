

<?php   
//insert the header code here
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
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>
<!--<?php include("headerEm.php"); ?> -->
    
    <div class="page" id="order-page">
        <div class="brand-banner">
            <img src="banner.jpg" alt="Coffee Paradise Banner">
        </div>
        <h1>Select Your Coffee</h1>
        <div class="store-info">
            <h2 class="store-name">Coffee Paradise</h2>
        </div>
        <div class="products">
            

                <!-- process the result-->
            <?php while ($result = mysqli_fetch_assoc($result_set)){?>
                <!-- 商品1 -->
                <div class="product">
                <img src="coffee1.jpg" alt="<?php echo htmlspecialchars($result['coffee_name']); ?>" class="product-image">
                    <h3 class="product-name" name="product-name"><?php echo htmlspecialchars($result['coffee_name']);?></h3>
                    <p class="product-description" name="product-description"><?php echo htmlspecialchars($result['coffee_description']); ?></p>
                    <p class="product-price" name="product-price"><?php echo htmlspecialchars ($result['coffee_price']); ?></p>
                </div>
                
                <div class="product-options">
                    <label for="temperature">Temperature:</label>
                    <select class="product-temperature" name="temperature">
                        <option value="hot">Hot</option>
                        <option value="cold">Cold</option>
                    </select>
                    <label for="size">Cup Size:</label>
                    <select class="product-size" name="size">
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>
                <div class="quantity-controls">
                        <button type="button" class="btn-decrease">-</button>
                        <input type="number" class="product-quantity" name="quantity" value="1" min="1" max="100">
                        <button type="button" class="btn-increase">+</button>
                    </div>
                    <button type="button" class="btn-add-to-cart">Add to Cart</button>
                </div>
            <?php } ?>
        </div>
        <button class="btn" id="go-to-cart" onclick="window.location.href='cart.html'">Go to Cart</button>
    </div>

            <!-- 商品2 
            <div class="product">
                <img src="coffee2.jpg" alt="Cappuccino" class="product-image" name="product-image">
                <h3 class="product-name" name="product-name">Cappuccino</h3>
                <p class="product-description" name="product-description">A classic Italian coffee.</p>
                <p class="product-price" name="product-price">$5.00</p>
                <div class="product-options">
                    <label for="temperature">Temperature:</label>
                    <select class="product-temperature" name="temperature">
                        <option value="hot">Hot</option>
                        <option value="cold">Cold</option>
                    </select>
                    <label for="size">Cup Size:</label>
                    <select class="product-size" name="size">
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                    </select>
                </div>
                <div class="quantity-controls">
                    <button type="button" class="btn-decrease" name="decrease">-</button>
                    <input type="number" class="product-quantity" name="quantity" value="1" min="1" max="100" readonly>
                    <button type="button" class="btn-increase" name="increase">+</button>
                </div>
                <button type="button" class="btn-add-to-cart" name="add-to-cart">Add to Cart</button>
            </div> -->
        </div>
        <button class="btn" id="go-to-cart" name="go-to-cart" >Go to Cart</button>
    </div>

        <!--TO DO: add a fixed footer php file
        <?php include 'footerEm.php'; ?> 
        -->
</body>
</html>
