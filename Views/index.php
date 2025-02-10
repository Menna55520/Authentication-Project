<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp Page</title>
    <link rel="stylesheet" href="../inc/style.css">
</head>
<body>
    <section class="container">
        <div class="login-container">
            <div class="circle circle-one"></div>
            <div class="form-container">
                <img src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png" alt="illustration" class="illustration" />
                <h1 class="opacity">SignUp</h1>
                <?php
                    session_start();
                    if(isset($_SESSION['insertError'])):?>
                        <script>alert('<?php echo $_SESSION['insertError']?>')</script>
                    <?php unset($_SESSION['insertError']); endif ;
                ?>
                <form action="../Handles/index.php" method='post'>
                    <input type="text" placeholder="USERNAME" name="userName" value="<?php if(isset($_SESSION['userName'])) echo $_SESSION['userName'] ; unset($_SESSION['userName'])?>" required/>
                    <?php if(isset($_SESSION['errors']['userName'])):
                    ?><div class="error-message"><?php echo $_SESSION['errors']['userName'] ; unset($_SESSION['errors']['userName']) ?></div>
                    <?php endif ; ?>
                    <input type="text" placeholder="EMAIL" name='email' value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'] ; unset($_SESSION['email'])?>" required/>
                    <?php if(isset($_SESSION['errors']['email'])):
                    ?><div class="error-message"><?php echo $_SESSION['errors']['email'] ; unset($_SESSION['errors']['email']) ?></div>
                    <?php endif ; ?>
                    <input type="password" placeholder="PASSWORD" name='password' required/>
                    <?php if(isset($_SESSION['errors']['password'])):
                    ?><div class="error-message"><?php echo $_SESSION['errors']['password'] ; unset($_SESSION['errors']['password']) ?></div>
                    <?php endif ; ?>
                    <input type="password" placeholder="CONFIRM PASSWORD" name='confirmPassword' required/>
                    <?php if(isset($_SESSION['errors']['confirmPassword'])):
                    ?><div class="error-message"><?php echo $_SESSION['errors']['confirmPassword'] ; unset($_SESSION['errors']['confirmPassword']) ?></div>
                    <?php endif ; ?>
                    <button type='submit' name='submit' class="opacity">SUBMIT</button>
                </form>
                <div class="register-forget opacity">
                <p>Already Have Account? <a href="login.php">Login</a></p>
                </div>
            </div>
            <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
    </section>
</body>
</html>