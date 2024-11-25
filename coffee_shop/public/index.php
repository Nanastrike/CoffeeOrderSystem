<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts/form-validation.js" defer></script>
</head>
<body>
    <div class="page" id="auth-page">
        <h1>Welcome to Douje Coffee</h1>
        <div class="auth-forms">
            <!-- display the error message -->
            <?php
            //this following part is written by Luo Qinyu 
                if (isset($_GET['error'])){
                    if ($_GET['error'] == 'invalid_email') {
                        echo '<p class="error_msg">Invalid email address.</p>';
                    } elseif ($_GET['error'] == 'invalid_password') {
                        echo '<p class="error_msg">Invalid password.</p>';
                    }
                }
            ?>

                <!-- login form, pass the value to php file -->
            <form id="login-form" method="POST" action="../private/login_check.php">
                <div class="register-login-header">
                    <h2>Login</h2>
                    <a href="register.php" class="register-btn">Register</a>
                </div>
                <label for="login-email">Email:</label>
                <input type="email" id="login-email" name="email" class="input-field" placeholder="Enter your email">
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="password" class="input-field" placeholder="Enter your password">
                <button type="submit" class="btn" name="login-submit">Login</button>
            </form>    
        
        </div>
    </div>


</body>
</html>
