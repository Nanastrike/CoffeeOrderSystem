<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Register</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
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
                    echo "<p class="error_msg">Invalid email address.</p>";
                }elseif($_GET['error'] == 'invalid_password'){
                    echo "<p class="error_msg">Invalid password.</p>";
                }
            }
            ?>
            <form id="login-form" method="POST" action='login_check.php'>
                <h2>Login</h2>
                <label for="login-email">Email:</label>
                <input type="email" id="login-email" name="email" class="input-field" placeholder="Enter your email" required>
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="password" class="input-field" placeholder="Enter your password" required>
                <button type="submit" class="btn" name="login-submit">Login</button>


            </form>
            <hr>
            <!-- 注册表单 -->

        <!-- TO DO: add a user name input
        the password need a double check, so the js validation will work-->
            <form id="register-form" method="post" action="register.php" name="register-form">
                <h2>Register</h2>
                <label for="register-email">Email:</label>
                <input type="email" id="register-email" name="email" class="input-field" placeholder="Enter your email" required>
                <label for="register-password">Password:</label>
                <input type="password" id="register-password" name="password" class="input-field" placeholder="Create a password" required>
                <button type="submit" class="btn" name="register-submit">Register</button>
            </form>
        </div>
    </div>

    <!--TO DO: add a fixed footer php file
        <?php include 'footerEm.php'; ?> 
        -->

</body>
</html>

