<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../private/database.php');
$db = db_connect();

// Test database connection
if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Test query
$sql = "SELECT coffee_name, coffee_price, coffee_description FROM coffee_details ORDER BY coffee_name ASC";
$result_set = mysqli_query($db, $sql);

if (!$result_set) {
    die("Query failed: " . mysqli_error($db));
}

// Display results
while ($result = mysqli_fetch_assoc($result_set)) {
    echo $result['coffee_name'] . " - $" . $result['coffee_price'] . "<br>";
}
?>
