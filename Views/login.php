<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="../inc/style.css">
</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
                <h1 class="opacity">LOGIN</h1>
                <?php
                    session_start();
                    if(isset($_SESSION['errors'])):?>
                    <script>alert('<?php echo $_SESSION['errors']?>')</script>
                    <?php unset($_SESSION['errors']) ; endif ;
                ?>
                <form action="../Handles/login.php" method="post">
                    <input type="text" placeholder="EMAIL" name='email' required/>
                    <input type="password" placeholder="PASSWORD" name='password' required/>
                    <button type='submit' name='submit' class="opacity">SUBMIT</button>
                </form>
                <div class="register-forget opacity">
                <p>Do Not Have Account? <a href="index.php">Sign Up</a></p>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
</body>
</html>