<?php
try{
    $conn = mysqli_connect('localhost','root','','cat',3307);
}catch(Exception $e){
    echo "Error Not Connected : ".$e->getMessage();
}