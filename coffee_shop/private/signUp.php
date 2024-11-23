<?php
session_start(); // Start the session

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('database.php');
$db = db_connect();

if (!$db) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Handle form values sent by register.php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Access the form data
    $nameInput = $_POST['name'] ?? '';
    $emailInput = $_POST['email'] ?? '';
    $passwordInput = $_POST['password'] ?? '';

    // Validate inputs
    if (empty($nameInput) || empty($emailInput) || empty($passwordInput)) {
        echo "All fields are required.";
        exit();
    }

    if (!filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    // Escape user inputs
    $nameInput = mysqli_real_escape_string($db, $nameInput);
    $emailInput = mysqli_real_escape_string($db, $emailInput);

    // Hash the password
    $hashedPassword = password_hash($passwordInput, PASSWORD_DEFAULT);

    // Check if the email already exists
    $emailCheckSql = "SELECT * FROM registration WHERE email_address = ?";
    $emailCheckStmt = mysqli_prepare($db, $emailCheckSql);
    mysqli_stmt_bind_param($emailCheckStmt, "s", $emailInput);
    mysqli_stmt_execute($emailCheckStmt);
    $emailCheckResult = mysqli_stmt_get_result($emailCheckStmt);

    if (mysqli_num_rows($emailCheckResult) > 0) {
        // Email already exists
        echo "An account with this email already exists.";
        exit();
    }

    // Proceed with registration
    $sql = "INSERT INTO registration (name, email_address, password) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($db, $sql);

    if ($stmt) {
        // Bind parameters
        mysqli_stmt_bind_param($stmt, "sss", $nameInput, $emailInput, $hashedPassword);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Retrieve the user ID of the newly registered user
            $userId = mysqli_insert_id($db);

            // Regenerate session ID for security
            session_regenerate_id(true);

            // Store user ID and name in session
            $_SESSION['user_id'] = $userId;
            $_SESSION['user_name'] = $nameInput;

            // Redirect to product list
            header("Location: ../public/product-list.php");
            exit();
        } else {
            // Handle execution error
            echo "Registration failed: " . mysqli_stmt_error($stmt);
            exit();
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Handle prepare error
        echo "Error preparing statement: " . mysqli_error($db);
        exit();
    }
} else {
    header("Location: ../public/index.php");
    exit();
}
?>
