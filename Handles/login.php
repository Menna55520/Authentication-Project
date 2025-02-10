<?php
require_once '../inc/conn.php' ;
session_start();
if(isset($_POST['submit'])){
    //catch
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    // check
    $query = "SELECT `password`,`id`,`userName` FROM users WHERE email='$email'";
    $runQuery = mysqli_query($conn,$query);
    if(mysqli_num_rows($runQuery) > 0){
        $data = mysqli_fetch_assoc($runQuery);
        $hashedPassword = $data['password'];
        if(password_verify($password,$hashedPassword)){
            $userName = $data['userName'];
            $id = $data['id'];
            $_SESSION['id'] = $id ;
            $_SESSION['userName'] = $userName ;
            header('location:../views/welcome.php');
            exit();
        }else{
            $_SESSION['errors'] = "Errors In Credentials" ;
            header('location:../views/login.php');
            exit();
        }
        
    }else{
        $_SESSION['errors'] = "Errors In Credentials" ;
        header('location:../views/login.php');
        exit();
    }


}else{
    header('location:../views/404.php');
}