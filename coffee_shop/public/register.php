<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js" defer></script>
</head>
<body>


</form>
    <!-- 注册表单 -->

<!-- TO DO: add a user name input
the password need a double check, so the js validation will work-->
    <form id="register-form" method="POST" action="../private/signUp.php" name="register-form">
        <h2>Register</h2>
        <label for="register-name">name:</label>
        <input type="text" id="register-name" name="name" class="input-field" placeholder="Enter your email" >
        <label for="register-email">Email:</label>
        <input type="email" id="register-email" name="email" class="input-field" placeholder="Enter your email" >
        <label for="register-password">Password:</label>
        <input type="password" id="register-password" name="password" class="input-field" placeholder="Create a password" >
        <button type="submit" class="btn" name="register-submit">Register</button>
    </form>


    <!--TO DO: add a fixed footer php file
        <?php include 'footerEm.php'; ?> 
        -->

</body>
</html>