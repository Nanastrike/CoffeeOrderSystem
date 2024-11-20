<?php

require_once('database.php');
$db = db_connect();

//handle the from values sent by login.php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){ //if user clicks the submit
    //$name = $_POST['name'];
    $emailInput = $_POST['email'];
    $passwordInput = $_POST['password'];

    //use sql to check if this user exists
    $sql = "SELECT * FROM registration WHERE email = '$emailInput'";
    $result = mysqli_query($db, $sql);

    //check if the email exists
    if($result && $result->num_rows>0){
        $row = mysqli_fetch_assoc($result);

        //verify the password
        if(password_verify($passwordInput, $row['password'])){
            //lead to the product list on successful login
            header("Location: product-list.php");
        }else{
            //invalid password
            header("Location: login.php?error=invalid_password");
        }
    }else{
        //invalid email
        header("Location: login.php?error=invalid_email");
    }

?>