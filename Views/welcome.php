<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('location:404.php'); exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?=$_SESSION['userName']?></title>
</head>
<body>
    Welcome <?=$_SESSION['userName']?>
</body>
</html>