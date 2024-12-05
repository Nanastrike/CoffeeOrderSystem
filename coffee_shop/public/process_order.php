<?php
session_start(); // Start the session to access $_SESSION

//the php part is written by Luo Qinyu 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../private/database.php');
$db = db_connect();

if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Handle form values sent by cart.php
if ($_SERVER['REQUEST_METHOD'] === 'POST') { // If user clicks the submit button
    $cart = $_SESSION['cart'] ?? null;

    // Retrieve user ID from session
    $userId = $_SESSION['user_id'] ?? null;

    // Check for Cart and User ID: Ensured both the cart and user ID are available
    if ($cart && $userId) {
        // Insert the single item directly into the database using a prepared statement
        $sql = "INSERT INTO order_list (product_name, product_price, product_num, registration_user_id) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($db, $sql);

        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sdii", $productName, $productPrice, $productNum, $userId);

            // Assign variables
            $productName = $cart['name'];
            $productPrice = $cart['price'];
            $productNum = $cart['quantity'];

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                // Success: Order has been placed
                // Optionally, clear the cart
                unset($_SESSION['cart']);

                // Redirect to order confirmation or order list page
                header("Location: order-list.php");
                exit();
            } else {
                // Handle execution error
                echo "Error executing query: " . mysqli_stmt_error($stmt);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            // Handle prepare error
            echo "Error preparing statement: " . mysqli_error($db);
        }
    } else {
        // Cart is empty or user is not logged in; handle accordingly
        header("Location: cart.php?error=empty_cart_or_not_logged_in");
        exit();
    }
    //this following part is written by Luo Qinyu 
} else {
    header("Location: cart.php");
    exit();
}
?>
