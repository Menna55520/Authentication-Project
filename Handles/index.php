<?php
require_once '../inc/conn.php' ;
session_start();
if(isset($_POST['submit'])){
    // catch data from form
    $userName = trim(htmlspecialchars($_POST['userName']));
    $email = trim(htmlspecialchars($_POST['email']));
    $password = trim(htmlspecialchars($_POST['password']));
    $confirmPassword = trim(htmlspecialchars($_POST['confirmPassword']));
    // validation
    $errors = [];
    // userName validation : at least one number one capital one small letter , unique ,  minlength 5
    if(strlen($userName) < 5){
        $errors['userName'] = "userName Must Be At Least 5 Chars";
    }elseif(!preg_match('/[0-9a-zA-Z]/' , $userName)){
        $errors['userName'] = "userName Must Be At Least one number one capital one small letter";
    }else{
        $query = "SELECT id FROM users WHERE userName='$userName'";
        $runQuery = mysqli_query($conn , $query);
        if(mysqli_num_rows($runQuery) > 0){
            $errors['userName'] = "userName Already Found";
        }
    }
    // email validation : unique , email 
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Must Be In Email Format";
    }else{
        $query = "SELECT id FROM users WHERE email='$email'";
        $runQuery = mysqli_query($conn , $query);
        if(mysqli_num_rows($runQuery) > 0){
            $errors['email'] = "Email Already Found";
        }
    }
    // password validation : at least 6 chars , at least contains one number and one letter
    if(strlen($password) < 6){
        $errors['password'] = "password Must Be At Least 6 Chars";
    }elseif(!preg_match('/[a-zA-Z0-9]/',$password)){
        $errors['password'] = "password Must Be At Least contains one number and letter";
    }
    // confirmPassword 
    if($confirmPassword !== $password){
        $errors['confirmPassword'] = "confirmPassword and Password Not Matched";
    }

    //check errors
    if(empty($errors)){
        // hash the password and insert and go to login page
        $password = password_hash($password ,PASSWORD_DEFAULT);
        $query = "INSERT INTO users(`userName`,`email`,`password`)VALUES('$userName','$email','$password')";
        $runQuery = mysqli_query($conn , $query);
        if($runQuery){
            // inserted successfully
            $_SESSION['success'] = 'You Registered Successfully' ;
            header("location:../views/login.php");
            exit();
        }else{
            // error while inserting
            $_SESSION['insertError'] = 'Error while inserting' ;
            header('location:../views/index.php');
            exit();
        }
    }else{
        // found errors
        $_SESSION['errors'] = $errors ;
        $_SESSION['userName']= $userName ;
        $_SESSION['email'] = $email ;
        header('location:../views/index.php');
        exit();
    }

}else{
    header('location:../views/404.php');
}