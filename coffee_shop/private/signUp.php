<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once('database.php');
$db = db_connect();

//handle form values sent by register.php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //if user clicks submit
    //access the form data
    $nameInput = $_POST['name'];
    $emailInput = $_POST['email'];
    $passwordInput = $_POST['password'];

    $hashedPassword = password_hash($passwordInput, PASSWORD_DEFAULT);
    $sql = "INSERT INTO registration (name,email_address, password) VALUES ('$nameInput','$emailInput','$hashedPassword')";
    /*for insert statement, $result is true/false */
    $result = mysqli_query($db, $sql);
    
    header("Location: ../public/product-list.php");
    exit();
} else{
    header("Location: ../public/index.php");
    exit();
}


?>