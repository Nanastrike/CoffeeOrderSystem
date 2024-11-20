<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('database.php');
$db = db_connect();

//handle the from values sent by login.php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //if user clicks the submit
    //$name = $_POST['name'];
    $emailInput = $_POST['email'];
    $passwordInput = $_POST['password'];
   // Escape user inputs to prevent SQL injection
    $emailInput = mysqli_real_escape_string($db, $emailInput);
    $passwordInput = mysqli_real_escape_string($db, $passwordInput);
    //use sql to check if this user exists
    $sql = "SELECT * FROM registration WHERE email_address = '$emailInput'";
    $result = mysqli_query($db, $sql);

    //check if the email exists
    if($result && $result->num_rows>0){
        $row = mysqli_fetch_assoc($result);

        //verify the password
        if(password_verify($passwordInput, $row['password'])){
            //lead to the product list on successful login
            header("Location: ../public/product-list.php");
            exit();
        }else{
            //invalid password
            header("Location: ../public/index.php?error=invalid_password");
            exit();
        }
    }else{
        //invalid email
        header("Location: ../public/index.php?error=invalid_email");
        exit();
    }
}else{
    // Redirect to login if accessed without POST
    header("Location: ../public/index.php");
    exit();
}

include "headerEm.php";
?>