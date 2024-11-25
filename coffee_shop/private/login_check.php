<?php
session_start();
//this following part is written by Luo Qinyu 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('database.php');
$db = db_connect();

//Handle the from values sent by login.php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //if user clicks the submit
    //design the input value
    $emailInput = $_POST['email'];
    $passwordInput = $_POST['password'];
   // Escape user inputs to prevent SQL injection
    $emailInput = mysqli_real_escape_string($db, $emailInput);
    $passwordInput = mysqli_real_escape_string($db, $passwordInput);

    //Use sql to check if this user exists
    $sql = "SELECT * FROM registration WHERE email_address = '$emailInput'";
    $result = mysqli_query($db, $sql);

    //Check if the email exists
    if($result && $result->num_rows>0){
        $row = mysqli_fetch_assoc($result);
        //this part above is written by Luo Qinyu

        //Verify the password
        if(password_verify($passwordInput, $row['password'])){

            // Store user ID and name in session
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['name'];
        
            //lead to the product list on successful login
            header("Location: ../public/product-list.php");
            exit();
        }else{
            //Invalid password
            header("Location: ../public/index.php?error=invalid_password");
            exit();
        }
        //this following part is written by Luo Qinyu 
    }else{
        //Invalid email
        header("Location: ../public/index.php?error=invalid_email");
        exit();
    }
}else{
    // Redirect to login if accessed without POST
    header("Location: ../public/index.php");
    exit();
}

?>