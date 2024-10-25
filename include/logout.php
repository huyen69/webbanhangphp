<?php 
session_start();

if(isset($_POST['submit'])){
    unset($_SESSION['auth']['customer']);
    unset($_SESSION['auth']['email']);
}
// chuyen ve dang nhap
header("Location:../index.php");