<!DOCTYPE html>
<html lang="en">
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

    <!-- TO DO: add a fixed php title here, you need to create a headerEm.php by yourself
    <?php include 'headerEm.php';?>
    -->

    <div class="page" id="auth-page">
        <div class="brand-logo">
            <img src="logo.png" alt="Brand Logo" name="brand-logo">
        </div>
        <h1>Welcome to Coffee Paradise</h1>
        <div class="auth-forms">
            <!-- 登录表单 -->
            <!-- display the error message -->
            <?php
                if (isset($_GET['error'])){
                    if ($_GET['error'] == 'invalid_email') {
                        echo '<p class="error_msg">Invalid email address.</p>';
                    } elseif ($_GET['error'] == 'invalid_password') {
                        echo '<p class="error_msg">Invalid password.</p>';
                    }
                }
            ?>

            <form id="login-form" method="POST" action="../private/login_check.php">
                <h2>Login</h2>
                <label for="login-email">Email:</label>
                <input type="email" id="login-email" name="email" class="input-field" placeholder="Enter your email" >
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="password" class="input-field" placeholder="Enter your password" >
                <button type="submit" class="btn" name="login-submit">Login</button>
            </form>    
        
        </div>
        <div>
        <a href='register.php'>Register</a>
        </div>
    </div>

    <!--TO DO: add a fixed footer php file
        <?php include 'footerEm.php'; ?> 
        -->

</body>
</html>

