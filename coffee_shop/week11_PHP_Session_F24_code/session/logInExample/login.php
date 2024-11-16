<?php
session_start();
?>

<?php

$users = array("Hala" => "xxxx", "Mia" => "yyyy", "Orange" => "zzzz"); //use database

if (isset($_POST['userid']) && isset($_POST['password'])) {
    // If the user has just tried to log in


    $userid = $_POST['userid'];
    $password = $_POST['password'];

    // Validate the existence of the user and password in the associative array
    if (isset($users[$userid]) && $users[$userid] === $password) {
        $_SESSION['valid_user'] = $userid; // Create session variable
        $_SESSION['valid_pass'] = $password; // Create another session variable
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">



</head>

<body>
    <h1>Home Page</h1>
    <?php
    if (isset($_SESSION['valid_user'])) {
        echo '<p>You are logged in as: ' . $_SESSION['valid_user'] . ' <br />';
        echo "<br>";
        echo "<br>";

        echo "session ID is " . session_id();
        echo "<br>";
        echo "<br>";
        echo '<a href="logout.php">Log out</a></p>';

        
    } else {
        if (isset($userid)) {
            // if they've tried and failed to log in
            echo '<p>Could not log you in.</p>';
        } else {
            // they have not tried to log in yet or have logged out
            echo '<p>You are not logged in.</p>';
        }
    }
    ?>
    <!-- provide form to log in -->
    
        <form action="login.php" method="post">

            <fieldset>
                <legend>Login Now!</legend>
                <p><label for="userid">UserID:</label>
                    <input type="text" name="userid" id="userid" size="30" />
                </p>
                <p><label for="password">Password:</label>
                    <input type="password" name="password" id="password" size="30" />
                </p>
            </fieldset>
            <button type="submit" name="login">Login</button>

        </form>
    

    <p><a href="members_only.php">Go to Members Section</a></p>
</body>

</html>