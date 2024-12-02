<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Register</title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts/form-validation.js" defer></script>
</head>

<body>
    <form id="register-form" method="post" action="../private/signUp.php" name="register-form">
        <div class="auth-forms" id="regis">
            <div class="register-header">
            <h2 class="register-title">Register</h2>
            <a href="index.php" class="login-btn">Login ></a>
            </div>
            <!--collect users' information -->
            <label for="register-name">Name:</label>
            <input type="text" id="register-name" name="name" class="input-field" placeholder="Enter your name" >

                    
            <label for="register-email">Email:</label>
            <input type="email" id="register-email" name="email" class="input-field" placeholder="Enter your email" >
                
                    
            <label for="register-password">Password:</label>
            <input type="password" id="register-password" name="password" class="input-field" placeholder="input your password" >

                    
            <label for="register-password-again">Password:</label>
            <input type="password" id="register-password-again" name="password-again" class="input-field" placeholder="input your password again" >

                    
            <button type="submit" class="btn" name="register-submit">Register</button>
        
        </div>

        </form>

</body>
</html>
