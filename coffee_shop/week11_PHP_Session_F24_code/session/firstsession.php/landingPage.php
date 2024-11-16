<!DOCTYPE html>
<html lang="en">

<head>

    <title>Landing Page</title>
    <style>
        /* Basic styling for the navigation */
        nav {
            background-color: #333;
            padding: 10px;
            display: inline-flex;
        }

        /* Style for the navigation links */
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            padding: 5px 10px;
            border-radius: 5px;


        }

        /* Hover effect for the navigation links */
        nav a:hover {
            background-color: #777;
        }
    </style>

</head>

<body>
    <h1> Session Example in PHP</h1>
    <nav><a href="<?php echo "landingPage.php " ?> ">Continue </a>
        <br>
        <br>
        <a href="<?php echo "hello.php " ?> ">Hello Page</a>
        <br>
        <br>
        <a href="<?php echo "restart.php " ?> ">Restart </a>
    </nav>
    <br>
    <br>
    <?php
    require  "mylibrary.php";
    echo   "Hello     " . name() . " ! This  is  your  page  request number ";
    echo count_requests() . " from  this  site";
    ?>
    <br>
    <br>
    <?php echo "session ID is " . session_id(); ?>
    <br>


</body>

</html>