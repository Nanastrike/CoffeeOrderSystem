<!-- This file was written by Jiu Cheng -->
<?php
session_start();

// Remove the item from the session cart
unset($_SESSION['cart']);

// Redirect back to the cart page
header('Location: cart.php');
exit();
?>
