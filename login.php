<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Signup</title>
    <link rel="stylesheet" href="login_design.css">
</head>

<body>
    <div id="login-form" class="form">
        <div class="sub-form">

           <h2>LOGIN FORM</h2>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message">
                    <strong><?php echo $_SESSION['error']; ?></strong>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <form action="error.php" method="POST">
              <label for="user">Username</label> <br>
              <input type="text" id="username" name="username" placeholder="Username" required> <br>
              <label for="pass">Password</label> <br>
              <input type="password" id="password" name="password" placeholder="Password" required> <br>
              <button name="login" class="login-btn" type="submit">Log in</button>   
            </form>
            <a href="signup.php"><button type="button" class="signup-btn">Sign up</button></a>
        </div>
    </div>
</body>
</html>
